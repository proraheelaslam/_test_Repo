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


class HomeController extends Controller
{
    //
	  public function __construct()
    {
	}
		
	public function index(){
	    echo 'hello';exit;
    }
	
}
