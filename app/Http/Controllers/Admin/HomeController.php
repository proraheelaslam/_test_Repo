<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\NewsLetter;
use App\Models\Students;
use App\Models\Schools;
use App\Models\Courses;
use App\Models\Orders;
use Session;
use Hash;
use App;
use App\Models\Email;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller {
	//
	public $view_path = 'admin/template';
	function index() {

		$users[] = Auth::user();
		$users[] = Auth::guard()->user();
		$users[] = Auth::guard('admin')->user();
		$data['total_instructors'] =  Students::where('is_instructor',1)->count();
		$data['total_students'] = Students::count();
		$data['total_course'] =  Courses::count();
        $data['total_orders'] =  Orders::count();
        $data['total_income'] =  Orders::where('order_status', 'Completed')->sum('order_total');
		$data['class'] = 'dashboard';

		return view('admin.template.home', $data);
	}
	public function showChangePasswordForm() {

		$data['title'] = 'Change Password';
		$data['class'] = '';
		return view($this->view_path . '/change_password', $data);
	}

	public function changePassword(Request $request) {

		if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
			// The passwords matches
			return redirect()->back()->with("error_message", "Your current password does not matches with the password you provided. Please try again.");
		}

		if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
			//Current password and new password are same
			return redirect()->back()->with("error_message", "New Password cannot be same as your current password. Please choose a different password.");
		}

		$validatedData = $request->validate([
			'current-password' => 'required',
			'new-password' => 'required|string|min:6|confirmed',
		]);

		//Change Password
		$user = Auth::user();
		$user->password = bcrypt($request->get('new-password'));
		$user->save();

		return redirect()->back()->with("success_message", "Password changed successfully !");

	}

	public function newsLetter(Request $request)
	{
		$request->validate([
			'message' => 'required',
			'title'   => 'required|max:100',
            'from_email'=> 'required|email',
		]);

        $fromEmail = $request->from_email;

		$emails = NewsLetter::pluck('email')->toArray();

        $email_data = Email::where('key','news_letter')->first();
        $email_subject = $request->title;


		try {
			foreach ($emails as $key => $single) {

                $email_body = $email_data->content;
                $email_body = str_replace('{message}', $request->message, $email_body);
			    $email_to= $single;
                $body = $email_body;
                $this->sendNewsLetterEmail($email_to, $email_data, $body, $email_subject,$fromEmail);

		    }
		}catch(\Exception $e){
				dd($e->getMessage());
		}

		Session::flash('success_message','News letter sent succeccfully');
		return redirect('admin/news_letter');


	}




    public function sendNewsLetterEmail($to ,$email_data, $body, $email_subject = '', $fromEmail){

        $res['results'] = $body;
        try {

            Mail::send([], $res, function ($message) use ($email_data, $to,$body, $email_subject, $fromEmail) {

                $message->setBody($body, 'text/html' );
                if($email_subject != '')
                {
                    $subject = $email_subject;
                    $email_from = $fromEmail;
                }
                else
                {
                    $subject = $email_data->subject;
                    $email_from = $fromEmail;
                }
                $message->from($email_from, $name = 'iLearning');
                $message->to($to, $to)->subject($subject);
            });
        }catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
