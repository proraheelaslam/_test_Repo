<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Students;
use Illuminate\Support\Facades\Lang;
use Socialite;
use Session;

class SocialAuthController extends Controller
{
    //
	public function __construct()
    {
        $this->middleware('preventBackHistory');
	}

    /**
     * Create a redirect method to facebook api.
     *
     * @return void
     */
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function handleProviderCallbackGoogle() {

        try {
            $user = Socialite::driver('google')->user();
        } catch (Exception $e) {
            return redirect('/');
        }

        $googleUser = $user;


        $user=Students::where('google_id',$googleUser->id)->first();

        if(!$user){

            //create new user and Rgister using this fb id
            $data['name']   = $googleUser->user['name'];
            $data['email']        = $googleUser->email;
            $data['google_id']     = $googleUser->id;
            //	print_r($data);
            Session::put('social_data', $data);


            return redirect('/student/register');

        }else{
            if($user->is_active==1){

                Auth::guard('student')->loginUsingId($user->id);
                return redirect('/student/dashboard');

            }else{
                Session::flash('error_message', Lang::get('messages.Your provided email does not exist or not activate.'));
                return redirect('/student/login');
            }
        }

    }
    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function handleProviderCallback() {


        try {
            $user = Socialite::driver('facebook')->user();
        } catch (Exception $e) {
            return redirect('/');
        }

        $facebookUser = $user;

        $url = "https://graph.facebook.com/me?fields=id,first_name,email&access_token=".@$facebookUser->token;
        $urlData = file_get_contents($url,true);
        $fbuserdata=json_decode($urlData,true);
        $user=Students::where('facebook_id',$fbuserdata["id"])->first();

        if(!$user){

            //create new user and Rgister using this fb id
            $data['name']   = $fbuserdata["first_name"];
            $data['email']        = $fbuserdata["email"];
            $data['facebook_id']  = $fbuserdata["id"];
            Session::put('social_data', $data);


            return redirect('/student/register');

        }else{
            if($user->is_active==1){

                Auth::guard('student')->loginUsingId($user->id);
                return redirect('/student/dashboard');
            }else{
                Session::flash('error_message', Lang::get('messages.Your provided email does not exist or not activate.'));
                return redirect('/student/login');
            }

        }

    }
}
