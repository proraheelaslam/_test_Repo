<?php

namespace App\Http\Controllers\SchoolAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Hesto\MultiAuth\Traits\LogsoutGuard;
use Illuminate\Support\Facades\Lang;

use Auth;
use Hashids;
use Session;
use App\Models\Schools;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    public $redirectTo = '/school/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('school.guest', ['except' => 'logout']);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('school.auth.login');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('school');
    }
    /**
     * logout Account
     *
     * @return \Illuminate\Http\Response
     */

    public function logout(Request $request) {
        Auth::logout();
        Session::flush();
        return redirect('/school/login');
    }
    /**
     * verify Account
     *
     * @return \Illuminate\Http\Response
     */
    function verifyAccount($id){

        $id = Hashids::decode($id)[0];
        $messageStatus = '';

        if($id){

            Auth::logout();

            Schools::where('id',$id)->update(array('is_active'=>'1'));

            $user = Schools::where('id',$id)->first();

            //session()->put('lang_key', $user->lang_key);

            Auth::login($user); // login user automatically

            $data['message'] = Lang::get('messages.Your account has been successfully activated/verified.');
            Session::flash('success_message', $data['message']);
            return redirect('/school/home');
        }else{
            $data['message'] = Lang::get('messages.Your provided email does not exist or not activate.');
            Session::flash('error_message', $data['message']);
            return redirect('/school/login');
        }

    }
    /**
     * validate Login Credentials
     *
     * @return \Illuminate\Http\Response
     */
    protected function validateLogin(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email|exists:schools,email,is_active,1',
            'password' => 'required',],
            [
                $this->username() . '.exists' => Lang::get('messages.The selected email is invalid or the account is not activated yet.')
            ]);
    }
}
