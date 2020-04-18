<?php

namespace App\Http\Controllers\Admin;

use App\Models\Inbox;
use App\Models\InboxThread;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscribers;
use DataTables;
use Session;
use Hashids;

class ChatController extends Controller {

	public $resource = 'admin/chats';
	public $view_path = 'admin/chats';
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//

		$data['class'] = 'chats';
		$data['title'] = 'Manage chats';
		$data['resource'] = $this->resource;
		return view($this->view_path . '/listing', $data);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Categories  $categories
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
		try {
			$id = Hashids::decode($id)[0];
			$Subscribers = Subscribers::findOrFail($id);
			$Subscribers->delete();
			Session::flash('success_message', 'Subscriber has been successfully deleted.');
			$response = 'success';
			return $response;
			// echo 'success';
		} catch (\Exception $e) {
			return redirect($this->resource);
		}
	}

	////
	public function getChatThread(Request $request) {

		$all_data = InboxThread::with('from_user', 'to_user','messages')->orderBy('created_at','desc');

		return Datatables::of($all_data)

			->addColumn('from_user', function ($single) {
				return $single->from_user->name . " with ". $single->to_user->name;
			})
            ->addColumn('last_message', function ($single) {
                return date( 'd-m-Y',strtotime($single->created_at));
            })
			->addColumn('action', function ($single) {
				$id = Hashids::encode($single->id);
				$action_html = '';
//				$action_html = '<a  '.get_tooltip('Delete User').' href="javascript:void(0);" onclick="delete_record(\'' . $id . '\')"><i class="fa fa-trash-o"></i></a>';
                $action_html .= '<a data-from-id="' . $single->from_user->id . '" data-to-id="' . $single->to_user->id . '" '.get_tooltip('Detail').'  href="chats/' . $id . '"><i class="fa fa-bars"></i></a>';
				return $action_html;

			})
			->editColumn('id', 'ID: {{$id}}')
			->rawColumns(['name', 'action'])
			->make(true);
	}


	public function show($id){
        $inboxData = Inbox::with('from_user','to_user')
            ->where('inbox_thread_id',Hashids::decode($id))
            ->orderBy('created_at','desc')
            ->get();
        return view($this->view_path.'/chat_detail',compact('inboxData'));
    }

    public function deleteMessage($id){

        try {

            $message = Inbox::findOrFail($id);
            $message->delete();
            Session::flash('success_message', 'Message has been successfully deleted.');
            $response = 'success';
            return $response;
            // echo 'success';
        } catch (\Exception $e) {
            return redirect($this->resource);
        }
    }
}
