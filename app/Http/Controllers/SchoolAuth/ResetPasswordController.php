<?php

namespace App\Http\Controllers\SchoolAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;

use Session;
use App\Models\Schools;
use Illuminate\Support\Facades\Lang;
use DB;
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

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
        $this->middleware('school.guest');
    }

    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string|null  $token
     * @return \Illuminate\Http\Response
     */
    public function showResetForm(Request $request, $token = null)
    {
        return view('school.auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker('schools');
    }

    /**
     * Get the guard to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('school');
    }

    public function reset_password(Request $request)
    {

        $this->validate($request,[
            'forgot_password_token' => 'required',
            'email'=> 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        $input = $request->all();

        $exist_token = DB::table('school_password_resets')->where('email',$request->email)->where('token', $request->forgot_password_token)->first();
        if($exist_token){
            $exist_instructor = Schools::where('email', $request->email)->where('is_active', 1)->first();
            if($exist_instructor){
                $exist_instructor->password = bcrypt($request->password);
                $exist_instructor->save();

                $data['message'] = Lang::get('messages.Your password has been updated.');

                Session::flash('status', $data['message']);
                return redirect('school/login');
            }else{

                $data['message'] = Lang::get('messages.Your provided email does not exist or not activate.');

                Session::flash('error_message', $data['message']);
                return redirect('school/password/reset/'.$request->forgot_password_token);
            }

        }else{
            $data['message'] = Lang::get('messages.Sorry, Please try again.');
            Session::flash('error_message', $data['message']);
            return redirect('school/password/reset/'.$request->forgot_password_token);

        }

    }
}
