<?php

namespace App\Http\Controllers\StudentAuth;

use App\Http\Controllers\Controller;
use App\Models\ShoppingCart;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Hesto\MultiAuth\Traits\LogsoutGuard;

use Illuminate\Support\Facades\Lang;

use Auth;
use Hashids;
use Session;
use App\Models\Students;
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

    use AuthenticatesUsers, LogsoutGuard {
        LogsoutGuard::logout insteadof AuthenticatesUsers;
    }

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    public $redirectTo = '/student/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('student.guest', ['except' => 'logout']);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('student.auth.login');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('student');
    }

    /**
     * logout Account
     *
     * @return \Illuminate\Http\Response
     */

    public function logout(Request $request) {
        $logined_id = Auth::guard('student')->user()->id;
        Students::where('id', $logined_id)->update(array('is_online'=>0));
        Auth::logout();
        Session::flush();
        return redirect('/student/login');
    }
    /**
     * verify Account
     *
     * @return \Illuminate\Http\Response
     */
    function verifyAccount($id){

        $ids = @Hashids::decode($id)[0];
        $messageStatus = '';

        if($ids){

            //Auth::logout();

            Students::where('id',$ids)->update(array('is_active'=>'1'));

            $user = Students::where('id',$ids)->first();

            //session()->put('lang_key', $user->lang_key);

            Auth::login($user); // login user automatically

            $data['message'] = Lang::get('messages.Your account has been successfully activated. Please login to enjoy services.');

            return redirect('/student/login')->with('success_message', $data['message']);
           /*  Session::flash('success_message', $data['message']);
            return redirect('/student/home');*/
        }else{
            $data['message'] = Lang::get('messages.Something is wrong with your activation link.');
           /* Session::flash('error_message', $data['message']);*/
            return redirect('/student/login')->with('error_message', $data['message']);

            //return redirect('/student/login');
        }

    }


    public function login(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email|exists:students,email,is_active,1',
            'password' => 'required|min:6',],
            [
                $this->username() . '.exists' => Lang::get('messages.Your provided email does not exist or not activate.')
            ]);

        $data['email']  = $request->email;
        $data['password'] = $request->password;


        if (Auth::guard('student')->attempt($data)) {

            $loginned_id = Auth::guard('student')->user()->id;
            Students::where('id', $loginned_id)->update(array('is_online'=>1));
            ShoppingCart::where('order_id', 0)->where('ip', getUniqueSessionId())->update(array('student_id'=>$loginned_id,'ip'=>null));
            return redirect('/student/dashboard');
        }else{
            $data['message'] = Lang::get('messages.These credentials do not match our records.');
            Session::flash('error_message', $data['message']);
            return redirect('/student/login');
        }
    }
}
