<?php

namespace App\Http\Controllers\StudentAuth;


use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

use App\Models\Email;
use App\Models\Students;
use Illuminate\Support\Facades\Lang;
use URL;
use Session;
use Log;
use Hashids;
use Illuminate\Http\Request;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/student/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('student.guest');
    }


    public function register(Request $request){
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:students',
            'password' => 'required|min:6|confirmed'
        ]);

        $facebook_id='';
        $google_id='';
        if($request->facebook_id!=''){
            $facebook_id=$request->facebook_id;
        }

        if($request->google_id!=''){
            $google_id=$request->google_id;
        }
        $student = Students::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_instructor' => isset($request->is_instructor)?$request->is_instructor:0,
            'facebook_id' =>$facebook_id,
            'google_id' => $google_id
        ]);
        $student = $student->fresh();

        $email_data = Email::where('key', 'user_register')->first();


        if (@$request->is_instructor == 1) {
            $user_type = 'Instructor';
        } else {
            $user_type = 'Student';
        }

        $link = URL::to("/") . "/student/verifyaccount/" . Hashids::encode($student->id);

        $url_link = "<a href=" . $link . ">Here</a>";


        $email_to = $request->email;
        $email_subject = $email_data->subject;
        $email_body = $email_data->content;
        $email_body = str_replace('{user_type}', $user_type, $email_body);
        $email_body = str_replace('{link}', $url_link, $email_body);

        $body = $email_body;
        Email::sendEmail($email_to, $email_data, $body, $email_subject);

        Session::forget('social_data');

        $data['message'] = Lang::get('messages.An Email has been sent to you with activation link.');
        Session::flash('success_message', $data['message']);
        return redirect('/student/login');

    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('student.auth.register');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('student');
    }
}
