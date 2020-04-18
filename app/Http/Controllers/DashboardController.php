<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Email;
use App\Models\Students;
use Hashids;
use Session;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\Inbox;
use App\Models\Review;
use App\Models\Courses;
use App\Models\UserCourse;
use App\Models\CourseBookmarks;
use App\Models\UserViews;
use DB;
use Carbon\Carbon;
class DashboardController extends Controller
{
    //
	public function __construct()
    {
        $this->middleware('preventBackHistory');
	}

	public function setLanguage($locale){

	    //Config::set('app.fallback_locale', $locale);
        \App::setLocale($locale);

        session(['site_locale' => $locale]);
        return redirect()->back();
    }
    public function  index(){


        $users[] = Auth::user();
        $users[] = Auth::guard()->user();
        $users[] = Auth::guard('student')->user();


        if($users[0]->is_instructor==1){
            //For Instructor Dashboard
            $messages =Inbox::where('to_id', $users[0]->id)->count();
            $reviews =  Students::where('id', $users[0]->id)->first()->total_instructor_review;
            $courses = Courses::where('student_id', $users[0]->id)->count();
            $bookmarks = CourseBookmarks::where('user_id', $users[0]->id)->count();

        }else{
            //For Student Dashboard
            $messages =Inbox::where('from_id', $users[0]->id)->count();
            $reviews =  Students::where('id', $users[0]->id)->first()->total_instructor_review;
            $courses = UserCourse::where('user_id', $users[0]->id)->count();
            $bookmarks = CourseBookmarks::where('user_id', $users[0]->id)->count();
        }
        //$all_viewed_users = UserViews::select('to_id')->groupBy('to_id')->get()->toArray();
       // $all_viewed_users = UserViews::where('to_id',$users[0]->id)->get()->toArray();

        return view('student.dashboard',compact('messages','reviews', 'courses', 'bookmarks'));

    }

    public function viewsAjaxReport(request $request){
        if(isset($request->yearsDropdown)){
            $years     =  $request->yearsDropdown;
        }else{
            $years     =  date("Y");
        }
        $viewed_count = UserViews::select('created_at', 'to_id')
            ->orderBy("created_at")
            ->whereYear('created_at', '=', date("Y") )
            ->where('to_id', Auth::user()->id)
            ->get()
            ->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('m'); // grouping by months
            });

        $monthCount  = [];
        $viewsPerMonth = [];

        foreach ($viewed_count as $key => $value) {
            $monthCount[(int)$key] = count($value);
        }

        for($i = 1; $i <= 12; $i++){
            if(!empty($monthCount[$i])){
                $viewsPerMonth[] = $monthCount[$i];
            }else{
                $viewsPerMonth[] = 0;
            }
        }

        $result['views'] =  $viewsPerMonth;
        $result['months']  =  ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];


        return response()->json(['result' => $result]);
    }

    /*public function index($name='ali')
    {

        $apiKey='46462902';
        $apiSecret='e56ddeadf88c05a4f1ba55cfe7ef06b46ad0b313';
        $opentok = new OpenTok($apiKey, $apiSecret);
        //	$session = $opentok->createSession();//// Create a session that attempts to use peer-to-peer streaming:


        //	$session = $opentok->createSession(array( 'mediaMode' => MediaMode::ROUTED ));/// A session that uses the OpenTok Media Router, which is required for archiving:

        // An automatically archived session:
        $sessionOptions = array(
            'archiveMode' => ArchiveMode::ALWAYS,
            'mediaMode' => MediaMode::ROUTED
        );
        $session = $opentok->createSession($sessionOptions);


        // Store this sessionId in the database for later use
        $sessionId = $session->getSessionId();
        echo $sessionId='2_MX40NjQ2MjkwMn5-MTU3NDc3MDc5MjMzMH5nZVhNRHpRYTR2TkFidG8rclJ0NzJ0NWt-QX4';

        ///T1==cGFydG5lcl9pZD00NjQ2MjkwMiZzaWc9MzQzNzY1ODJmN2FlNjBjYjQxYjk0ZDMwOGM3YjQ0MWExMGI2YTNhMDpzZXNzaW9uX2lkPTJfTVg0ME5qUTJNamt3TW41LU1UVTNORGMzTURjNU1qTXpNSDVuWlZoTlJIcFJZVFIyVGtGaWRHOHJjbEowTnpKME5XdC1RWDQmY3JlYXRlX3RpbWU9MTU3NDc3MDg0MiZyb2xlPW1vZGVyYXRvciZub25jZT0xNTc0NzcwODQyLjY2MjI1MjUwNjg4MTcmZXhwaXJlX3RpbWU9MTU3NTM3NTY0MiZjb25uZWN0aW9uX2RhdGE9bmFtZSUzRGFsaSZpbml0aWFsX2xheW91dF9jbGFzc19saXN0PWZvY3Vz



        //	exit;

        // Generate a Token from just a sessionId (fetched from a database)
        $token = $opentok->generateToken($sessionId,array(
            'role'       => Role::MODERATOR,//MODERATOR,
            'expireTime' => time()+(7 * 24 * 60 * 60), // in one week
            'data'       => 'name='.$name,
            'initialLayoutClassList' => array('focus')
        ));

        // Generate a Token by calling the method on the Session (returned from createSession)
        //$token = $session->generateToken();

        // Set some options in a token


        //$token = $session->generateToken(array(
        //  'role'       => Role::MODERATOR,
        // 'expireTime' => time()+(7 * 24 * 60 * 60), // in one week
            //'data'       => 'name='.$name,
            //'initialLayoutClassList' => array('focus')
        //));

        echo '<br>';
        echo 'session token=='.$token;
        echo '<br>';

        echo '<br>'; echo '<br>'; echo '<br>'; echo '<br>'; echo '<br>'; echo '<br>';


        exit;


        $archiveList = $opentok->listArchives(0,1,$sessionId);

        // Get an array of OpenTok\Archive instances
        $archives = $archiveList->getItems();
        print_r($archives);
        // Get the total number of Archives for this API Key
        $totalCount = $archiveList->totalCount();
        echo $totalCount;
            exit;
            $data['dd']='sss';
            return view('welcome',$data);
    }*/

	///////////////////////////
	function second(){

		$apiKey='46462902';
		$apiSecret='e56ddeadf88c05a4f1ba55cfe7ef06b46ad0b313';
		$opentok = new OpenTok($apiKey, $apiSecret);
		$sessionId='';
		$archive = $opentok->startArchive($sessionId);


        // Create an archive using custom options
        $archiveOptions = array(
            'name' => 'Important Presentation',     // default: null
            'hasAudio' => true,                     // default: true
            'hasVideo' => true,                     // default: true
            'outputMode' => OutputMode::COMPOSED,   // default: OutputMode::COMPOSED
            'resolution' => '640x480'              // default: '640x480'
        );
        $archive = $opentok->startArchive($sessionId, $archiveOptions);

        print_r($archive);
        exit;
        // Store this archiveId in the database for later use
        $archiveId = $archive->id;

        echo 'archiveId=='.$archiveId;
        echo '<br>';


        $broadcast = $opentok->startBroadcast($sessionId);


        // Start a live streaming broadcast of a session, using broadcast options
        $options = array(
            'layout' => Layout::getBestFit(),
            'maxDuration' => 5400,
            'resolution' => '1280x720'
        );
        $broadcast = $opentok->startBroadcast($sessionId, $options);

        // Store the broadcast ID in the database for later use
        $broadcastId = $broadcast->id;
        echo 'broadcastId=='.$broadcastId;
        echo '<br>';
        $archive = $opentok->getArchive($archiveId);

        $archiveList = $opentok->listArchives();

        // Get an array of OpenTok\Archive instances
        $archives = $archiveList->getItems();
        // Get the total number of Archives for this API Key
        $totalCount = $archiveList->totalCount();
        exit;

    }

    function readNotification(Request $request){
        $notify_id = $request->notify_id;
        Notification::where('id', $notify_id)->update(array('is_read'=>1));
        echo 1;
    }
}
