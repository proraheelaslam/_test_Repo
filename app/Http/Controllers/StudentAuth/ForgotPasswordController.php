<?php

namespace App\Http\Controllers\StudentAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;

use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\Email;
use URL;
use Session;

use Illuminate\Support\Facades\Lang;
use Hash;
use DB;
class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('student.guest');
    }

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
        return view('student.auth.passwords.email');
    }

    public function forget_password(Request $request) {

        $rules['email'] = 'required|email|exists:students,email,is_active,1';

        $messages = [
            'email.exists' => Lang::get('messages.This email does not exists in our system.'),
        ];

        $this->validate($request, $rules, $messages);

        $input = $request->all();

        $student = Students::where('email',$request->email)->where('is_active','1')->first();

        if($student){
            $rest_token='';
            $token =  str_random(30).$student->_id;
            $existToken  = DB::table('student_password_resets')->where('email',$request->email)->first();

            if($existToken){

                DB::table('student_password_resets')->where('email',$request->email)->update(array('token'=>$token));
                $rest_token = $token;

            }else{

                DB::table('student_password_resets')->insert(
                    array(
                        'email'     =>  $request->email,
                        'token'   =>    $token
                    )
                );
                $rest_token = $token;
            }
            $email_data = Email::where('key','forget_password')->first();


            $link = URL::to("/")."/student/password/reset/".$rest_token;

            $url_link            =   "<a href=".$link.">Here</a>";


            $email_to            = $request->email;
            $email_subject       = $email_data->subject;
            $email_body          = $email_data->content;
            $email_body          = str_replace('{link}',$url_link,$email_body);

            $body                = $email_body;
            Email::sendEmail($email_to,$email_data,$body,$email_subject);

            $data['message'] = Lang::get('messages.An Email has been sent to you with reset password link.');
            Session::flash('success_message', $data['message']);
            return redirect('/student/password/reset');

        }
        else{
            $data['message'] = Lang::get('messages.Email can not send to you may be your account is not active yet.');
            Session::flash('error_message', $data['message']);
            return redirect('/student/password/reset');
        }
    }
    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker('students');
    }
}
