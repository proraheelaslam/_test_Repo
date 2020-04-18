<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\User;
use Redirect;
use Session;
use Mail;
use DB;

class SettingsController extends Controller {

	public $resource = 'admin/home';
	public $view_path = 'admin';
	public $class_name = 'settings';

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index() {
		$data['page_title'] = 'General Settings';
		$data['class'] = $this->class_name;
		$data['subclass'] = 'wallet_settings';
		return view('admin.settings.settings', $data);
	}

	public function notification() {
		$data['page_title'] = 'Notification';
		$data['class'] = 'noti';
		$data['client'] = User::all();
		
	

		return view('admin.notifications.notification', $data);
	}
	public function send_notification($notification_type, $user_id, $message,$subject) {
		$user_id = $user_id;

		$message = $message;

		if ($notification_type == 'notification_by_admin') {

			$message = $message;

			$notification = new Notification();

			$notification->user_id = $user_id;
			$notification->status = 1;
			$notification->subject = $subject;
			$notification->notification = $message;
			//$notification->notification_type = $notification_type;
			$notification->save();
			//$notification->sendNotifocation($notification);

		}

	}
/**
update admin notification
 */
	public function update_notification(Request $request) {
		$input = $request->all();
		//$user_type = $input['user_type'];
	
			$this->validate($request, [
				'my-select_client' => 'required',
				'message' => 'required',

			]);
	

		//$user = User::findOrFail($id);

		$notification_type = $input['notification_type'];

		if ($notification_type == 'notification') {

	
				$user = $input['my-select_client'];

		
			foreach ($user as $key => $value) {
				$this->send_notification('notification_by_admin', $value, $input['message'],'Notification Subject');
			}
			Session::flash('success_message', 'Notification Sent Successfully!');

		} else if ($notification_type == 'email') {
//send email
			
				$user = $input['my-select_client'];

			
			foreach ($user as $key => $value) {

				$user_data = User::findOrFail($value);
				$destinationPath = '';
				$arr = array();
				if ($request->hasFile('image')) {

					$destinationPath = 'upload/admin_email'; // upload path
					$image = $request->file('image'); // file
					$extension = $image->getClientOriginalExtension(); // getting image extension
					$fileName = str_random(12) . '.' . $extension; // renameing image
					$image->move($destinationPath, $fileName); // uploading file to given path
					$input['image'] = $fileName;
				}

				$arr['email_from_address'] = settingValue('email_from');
				$arr['final_content'] = $input['message'];
				$arr['email_from_name'] = settingValue('email_from_name');
				$arr['email_title'] = 'Admin Notification Email';
				$arr['email_to'] = $user_data->email;
				$arr['email_name_client'] = $user_data->first_name.' '.$user_data->last_name;
				if(@$input['image']!=''){
				   $arr['email_attach_file'] = $destinationPath . '/' . @$input['image'];
				}
				else{
					   $arr['email_attach_file'] = '';
					}

				$this->sendEmail($arr);
			}
			Session::flash('success_message', 'Notification Sent Successfully!');
		}

		return redirect('admin/notifications');
	}

////send email
	public function sendEmail($email) {

		$email_name = $email['email_from_name'];

		$email_from = $email['email_from_address'];

		try {
			Mail::send('admin.mail.mail_body', $email, function ($message) use ($email) {

				$message->from($email['email_from_address'], $name = $email['email_from_name']);
		if($email['email_attach_file']!=''){
						$message->to($email['email_to'], $email['email_name_client'])->subject($email['email_title'])->attach($email['email_attach_file'], [
							'as' => 'File name']);
		}else{
			$message->to($email['email_to'], $email['email_name_client'])->subject($email['email_title']);
			}

			});
		} catch (Exception $e) {

			return $e->getMessage();
		}

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function update(Request $request) {
		$requestData = $request->all();
		unset($requestData['_token']);

		foreach ($requestData as $key => $value) {

			$setting = Settings::where('key', $key)->count();

			if ($setting > 0) {

				DB::table('settings')->where('key', $key)->update(['value' => $value]);
			} else {
				DB::table('settings')->insert(['key' => $key, 'value' => $value]);
			}
		}

		Session::flash('success_message', 'Settings updated!');

		return redirect('admin/settings');
	}

}
