<?php


namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Validator;
use Hashids;
use Image;
use File;
use DB;
use Illuminate\Support\Facades\Auth;
use OpenTok\OpenTok;
use OpenTok\MediaMode;
use OpenTok\ArchiveMode;
use OpenTok\Session as opensession;
use OpenTok\Role;
use OpenTok\OutputMode;
use OpenTok\Layout;


class ChatController extends Controller
{
    //
    public function __construct()
    {

    }

    public function index($name='ali')
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
    }
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

}
