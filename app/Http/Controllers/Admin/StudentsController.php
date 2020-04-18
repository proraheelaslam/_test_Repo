<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\Schools;
use App\Models\Grades;
use App\Models\Classes;
use App\Models\Email;
use DataTables;
use Hashids;
use Session;
use Image;
use Mail;
use URL;

class StudentsController extends Controller {
	public $resource = 'admin/users';
	public $view_path = 'admin/students';
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		$data['class'] = 'users';
		$data['title'] = 'Manage Users';
		$data['resource'] = $this->resource;
		return view($this->view_path . '/listing', $data);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
		//
		$data['title'] = 'Add User';
		$data['class'] = 'users';
		$data['resource'] = $this->resource;
		return view($this->view_path . '/add', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
		$input = $request->all();

		$rules['company_type'] = 'required';

		if ($input['company_type'] == 'company') {

			$rules['company_name'] = 'required|string|max:255';

			$rules['contact_name'] = 'required|string|max:255';

			$rules['company_website'] = 'required';

			$rules['company_email'] = 'required|string|email|max:255';

			$rules['company_phone'] = 'required|max:255';

			$rules['day_gurantee'] = 'required';

			$rules['month_gurantee'] = 'required';

			$rules['company_license'] = 'required';

		}

		$rules['password'] = 'required|string|min:4';

		$user_type = 'service_provider';

		$rules['email'] = 'required|string|email|max:255|unique:users,user_type';

		$rules['phone_number'] = 'required|max:255';

		$rules['name'] = 'required|string|max:255';

		$rules['location'] = 'required';

		$messages = array();

		$this->validate($request, $rules, $messages);

		$checkuser = User::where(['email' => $input['email'], 'user_type' => 'service_provider'])->get()->first();

		if ($checkuser) {

			return redirect()->back()->with("error_message", "This Email Address already Exist.");

		} else {

			$userdata['name'] = $input['name'];

			$userdata['phone_number'] = $input['phone_number'];

			$userdata['email'] = $input['email'];

			$userdata['password'] = bcrypt($input['password']);

			$userdata['location'] = $input['location'];

			$userdata['lat'] = $input['lat'];

			$userdata['lng'] = $input['lng'];

			$userdata['user_type'] = 'service_provider';

			$userdata['preffered_language'] = 'en';

			$user = User::create($userdata);

			if ($user) {

				///insert data in user_company

				$comdata['company_type'] = $input['company_type'];

				$comdata['user_id'] = $user->id;

				if ($input['company_type'] == 'company') {

					$comdata['company_name'] = $input['company_name'];

					$comdata['company_website'] = $input['company_website'];

					$comdata['company_email'] = $input['company_email'];

					$comdata['company_phone'] = $input['company_phone'];

					$comdata['company_phone'] = $input['company_phone'];

					$comdata['contact_name'] = $input['contact_name'];

					$comdata['day_gurantee'] = $input['day_gurantee'];

					$comdata['month_gurantee'] = $input['month_gurantee'];

					$comdata['company_license'] = $input['company_license'];

				}
			}

			$usercom = UserCompany::create($comdata);

			Session::flash('success_message', 'You have successfully added new user');

			return redirect($this->resource);
		}
	}




	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {

		//
		try {
			$id = Hashids::decode($id)[0];

		    $students = Students::findOrFail($id);

			 $grades = Grades::all();

			 $classes = Classes::all();

		      $schools = Schools::all();

			 $data['students'] = $students;

			  $data['grades'] = $grades;

			  $data['classes'] = $classes;

			  $data['schools'] = $schools;

			$data['title'] = 'Update User';

			 $data['class'] = 'users';

			return view($this->view_path . '/edit', $data);
		} catch (\Exception $e) {
			return redirect($this->resource);
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function update($id, Request $request) {

		$students = Students::findOrFail($id);

		$input = $request->all();


        $rules['first_name'] = 'required';

		$rules['last_name'] = 'required';

        $rules['phone'] = 'required';

		$rules['about_student'] = 'required';

		$messages = array();

		$this->validate($request, $rules, $messages);

		$checkuser = Students::where(['email' => $input['email']])->where('id','!=', $id)->get()->first();

		if ($checkuser) {

			return redirect()->back()->with("error_message", "This Email Address already Exist.");

		} else {

		if ($request->hasFile('image')) {

			$image_path = "public/uploads/students/" . $students->image;
			$thumbimage_path = "public/uploads/students/thumbs/" . $students->image;
if($students->image!='no_image'){
			if (file_exists($image_path)) {

				@unlink($image_path);
				@unlink($thumbimage_path);
			}}
			$destinationPath = 'public/uploads/students'; // upload path
			$image = $request->file('image'); // file
			$extension = $image->getClientOriginalExtension(); // getting image extension
			$fileName = str_random(12) . '.' . $extension; // renameing image
			$img = Image::make($image->getRealPath());
			$img->resize(200, 200, function ($constraint) {
				$constraint->aspectRatio();
			})->save($destinationPath . '/thumbs/' . $fileName);
			$image->move($destinationPath, $fileName); // uploading file to given path

			$input['image'] = $fileName;
		}

	     $students->update($input);



			Session::flash('success_message', 'You have successfully Updated User');

			return redirect($this->resource);
		}

	}


function removeImage(Request $request){

		 $input = $request->all();

		 $ig= Students::where('id',$input['image_id'])->first();

		    $image_path2      = "public/uploads/students/" . $ig->image;
			$thumbimage_path2 = "public/uploads/students/thumbs/" . $ig->image;

			if (file_exists($image_path2)) {

				@unlink($image_path2);
				@unlink($thumbimage_path2);
			}
		 // $ig->delete();
		 $inp['image']='';
		  $ig->update($inp);
		  echo 1;
		  exit;

		}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		try {
			$id = Hashids::decode($id)[0];
			$students = Students::findOrFail($id);


			$students->delete();

			Session::flash('success_message', 'User has been successfully deleted.');

			echo 'success';
		} catch (\Exception $e) {
			return redirect($this->resource);
		}
	} //



	////upadte status of client
	public function updatestatus($id, Request $request, Students $students) {

		$id = Hashids::decode($id)[0];

		$students = Students::findOrFail($id);

		$input = $request->all();

		$students->update($input);


		Session::flash('success_message', 'Status successfully updated.');
		echo 1;
	}

    public function resetpassword($id, Request $request, Schools $schools) {
        $id = Hashids::decode($id)[0];
        $students = Students::findOrFail($id);
        $str=str_random(8);
        $hashed_random_password = bcrypt($str);
        $user_arr['password']=$hashed_random_password;
        $input = $request->all();

        $students->update($user_arr);

        $arr = array();

        $email_data = Email::where('key','reset_password')->first();
        $email_subject = $email_data->subject;
        $email_body = $email_data->content;
        $email_body = str_replace('{username}', $students->name, $email_body);
        $email_body = str_replace('{password}', $str, $email_body);
        $email_to= $students->email;
        $body = $email_body;

        Email::sendEmail($email_to, $email_data, $body, $email_subject);

        Session::flash('success_message', 'Reset password successfully done.');
        echo 1;
    }
	/*public function sendEmail($email) {

		$email_name = $email['email_from_name'];

		$email_to = $email['email_to'];

		try {
			Mail::send('admin.mail.reset_mail', $email, function ($message) use ($email, $email_to, $email_name) {
				$message->from($email['email_from_address'], $name = $email_name);
				$message->to($email_to, $email_to)->subject($email['email_title']);

			});
		} catch (Exception $e) {
			echo $e->getMessage();
		}

	}*/
	///
	function getStudents() {

		$all_data = Students::all();

		return Datatables::of($all_data)

			->addColumn('name', function ($single) {
				return $single->first_name;
			})
			->addColumn('email', function ($single) {
				return $single->email;
			})	->addColumn('reset_password', function ($single) {
				$id = Hashids::encode($single->id);
					return '<span style="cursor:pointer" data-user_id="' . $single->id . '" onclick="reset_password(\'' . $id . '\',this)" class="label label-primary">Reset Password</span>';

			})
            ->addColumn('role', function ($single) {
                if($single->is_instructor==0){
                    return 'Student';
                }else{
                    return 'Both';
                }
            })
			->addColumn('status', function ($single) {
				$id = Hashids::encode($single->id);
				$class = '';
				switch ($single->is_active) {
				case 0:
					$class = 'label label-default';
					$name = 'Inactive';
					break;
				case 1:
					$class = 'label label-primary';
					$name = 'Active';
					break;

				default:
					$class = 'label label-info';
					$name = 'active';
					break;
				}
				return '<span style="cursor:pointer" data-status="' . $single->is_active . '" onclick="update_status(\'' . $id . '\',this)" class="' . $class . '">' . $name . '</span>';

			})
			->addColumn('action', function ($single) {
				$id = Hashids::encode($single->id);
				$action_html = '';
				$action_html = '<a  '.get_tooltip('Update Students').' href="users/' . $id . '/edit"><i class="fa fa-edit"></i></a>';
				return $action_html;

			})
			->editColumn('id', 'ID: {{$id}}')
			->rawColumns(['name', 'email','role', 'reset_password', 'status', 'action'])
			->make(true);

	}

}
