<?php

namespace App\Http\Controllers;

use Hashids;
use Session;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Lang;
use Image;
use File;

use App\Models\Inbox;
use App\Models\InboxThread;

class MessageController extends Controller
{
    //
	public function __construct()
    {
        $this->middleware('preventBackHistory');
	}

    public function  index($id=0){

	    $id = Hashids::decode($id)[0];
        $user = Auth::user();

        return view('student.messages.message_thread',compact('user', 'id'));

    }

    public function getMessages(Request $request){

	    $thread_id = $request->thread_id;

        Inbox::with('from_user', 'to_user')
            ->where('to_id', Auth::user()->id)
            ->where('inbox_thread_id', $thread_id)
            ->where('is_read', 0)
            ->update(array('is_read'=>1));

	    $inbox_messages = Inbox::with('from_user', 'to_user')->where('inbox_thread_id', $thread_id)->get();
	    $inbox_thread = InboxThread::with('from_user', 'to_user')->where('id', $thread_id)->first();

	    $final_array['inbox_messages'] = $inbox_messages;
	    $final_array['inbox_thread'] = $inbox_thread;

        return response()->json([
            'data' => view('student/messages/messages')->with('message_data',$final_array)->render()
        ]);
    }

    public function createThread(Request $request){
        $thread_id = 0;
	    $to_id = $request->id;
        $authenticated_user =  Auth::user()->id;

        $already_thread = InboxThread::where(function($query) use($authenticated_user,$to_id){
            return $query->where('from_id', $authenticated_user)
                        ->where('to_id', $to_id);

        })->orWhere(function($query) use($authenticated_user,$to_id){
            return $query->where('to_id', $authenticated_user)
                ->where('from_id', $to_id);

        })->first();
        if($already_thread){
            $thread_id = $already_thread->id;
        }else{
            $thread = InboxThread::create(array('from_id'=>$authenticated_user, 'to_id'=>$to_id));
            $thread_id = $thread->id;
        }

        return response()->json([
            'thread_id' => Hashids::encode($thread_id)
        ]);
    }
    public function postMessage(Request $request){
        $thread_det = InboxThread::where('id', $request->thread_id)->first();

        if($thread_det->from_id == Auth::user()->id){

            $input['from_id'] = $thread_det->from_id;
            $input['to_id'] = $thread_det->to_id;

        }else{

            $input['from_id'] = $thread_det->to_id;
            $input['to_id'] = $thread_det->from_id;

        }
        $input['inbox_thread_id'] = $request->thread_id;
        $input['message'] = $request->message;

        Inbox::create($input);
        InboxThread::where('id', $request->thread_id)->update(array('updated_at'=>Carbon::now()->toDateTimeString()));
        $data['message'] = Lang::get('messages.Your message has been posted successfully.');
        Session::flash('success_message', $data['message']);
        return redirect('/student/messages/'.Hashids::encode($request->thread_id));
    }

    public function searchThread(Request $request){
	    $thread_id = $request->id;
	    $search_key = $request->search_key;
        $messages = InboxThread::with('messages', 'from_user', 'to_user')
            ->where('from_id', Auth::user()->id)
            ->orWhere('to_id', Auth::user()->id);

        $messages  =  $messages->orderBy('updated_at', 'desc')->get();

        if($search_key!=''){
            $messages->map(function ($single_msg) use($search_key){
                if($single_msg->from_id != Auth::user()->id){
                    if($this->like($single_msg->from_user->name, $search_key)){

                        $single_msg->is_shown = 1;
                    }
                }else{
                    if($this->like($single_msg->to_user->name, $search_key)){
                        $single_msg->is_shown = 1;
                    }
                }
                return $single_msg;
            });
        }

        $data['messages'] = $messages;
        $data['search_key'] = $search_key;
        $data['thread_id'] = $thread_id;
        return response()->json([
            'data' => view('student/messages/message_thread_list')->with('messages',$data)->render()
        ]);
    }

    function like($str, $searchTerm) {
        $searchTerm = strtolower($searchTerm);
        $str = strtolower($str);
        $pos = strpos($str, $searchTerm);
        if ($pos === false)
            return false;
        else
            return true;
    }
}
