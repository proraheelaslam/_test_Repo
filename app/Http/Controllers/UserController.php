<?php

namespace App\Http\Controllers;

use Hashids;
use Session;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Lang;
use Image;
use File;

use App\Models\Students;
use Hash;
class UserController extends Controller
{
    //
	public function __construct()
    {
        $this->middleware('preventBackHistory');
	}

    public function  profileView(){

        $user = Auth::user();

        return view('student.user.profile',compact('user'));

    }

    public function updateProfile(Request $request){

	    //print_r($request->all());exit;
        $authenticated_user = Auth::user();

        $rules = [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
        ];
        if(isset($request->old_password)  && $request->old_password!=''){
            $rules['new_password'] = 'required|min:6|same:password_confirmation';
           // $rules['password_confirmation'] =  'required|same:new_password|min:6';
            $rules['old_password'] = ['required', function ($attribute, $value, $fail) use ($authenticated_user, $request) {
                if (!(Hash::check($request->get('old_password'), $authenticated_user->password))) {
                    return $fail(__( Lang::get('messages.Old password does not match with records.')));
                }
            }];
        }

        $this->validate($request, $rules);


        if(isset($request->old_password) && $request->old_password!=''){

                $input['password'] = bcrypt($request->new_password);
        }

        $input['first_name'] = $request->first_name;
        $input['last_name'] = $request->last_name;
        $input['phone'] = $request->phone;
        $input['about_student'] = $request->personal_info;
        $input['facebook'] = $request->facebook;
        $input['linkedin'] = $request->linkedin;
        $input['instagram'] = $request->instagram;
        $input['twitter'] = $request->twitter;
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if ($image_tmp->isValid()) {
                // Upload Images after Resize
                $extension = $image_tmp->getClientOriginalExtension();
                $fileName = rand(111,99999).'.'.$extension;
                $input['image'] = $fileName;
                $large_image_path = public_path('uploads/students/'.$fileName);
                Image::make($image_tmp)->save($large_image_path);
                $small_image_path = public_path('uploads/students/thumbs/'.$fileName);
                Image::make($image_tmp)->resize(50, 50)->save($small_image_path);

            }

            //delete image file from upload folder which is send from edit view throught hidden field with the name current_image.
            $file       = $authenticated_user->image;
            $filename   = public_path('uploads/students/'.$file);
            File::delete($filename);

            $thumbname   = public_path('uploads/students/thumbs/'.$file);
            File::delete($thumbname);

        }

        Students::where('id', $authenticated_user->id)->update($input);


        $data['message'] = Lang::get('messages.Settings has been updated successfully.');
        Session::flash('success_message', $data['message']);
        return redirect('/student/profile');
    }
}
