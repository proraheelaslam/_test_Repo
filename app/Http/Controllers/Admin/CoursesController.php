<?php

namespace App\Http\Controllers\Admin;

use App\Models\CourseFeature;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\ContentLecture;
use App\Models\CoursesContent;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\UserCourse;
use App\Models\Courses;
use App\Models\Classes;
use App\Models\Schools;
use App\Models\Grades;
use App\Models\Email;
use DataTables;
use Session;
use Hashids;
use Image;
use Mail;
use URL;
use File;

class CoursesController extends Controller {
	public $resource = 'admin/courses';
	public $view_path = 'admin/courses';
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		$data['class'] = 'courses';
		$data['title'] = 'Manage Courses';
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
		$data['title'] = 'Add Course';
		$data['class'] = 'courses';
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

            $courses = Courses::findOrFail($id);


            $categories =  Categories::where('parent_id', 0)->get();

            $data['courses'] = $courses;

            $data['categories'] = $categories;

            $data['title'] = 'Update Course';

            $data['class'] = 'courses';

            return view($this->view_path . '/edit', $data);
        }catch (\Exception $e) {
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

        $courses = Courses::findOrFail($id);

        $input = $request->all();


        $messages = array();

        $input['course_key'] = str_slug($input['name'], '-');
        $input['is_free'] = 0;
        if(isset($request->is_free) && $request->is_free == 'on'){
            $input['is_free'] = 1;
        }
        $whereData = array(array('course_key',$input['course_key']) , array('id' ,'!=',$id));

        $resut=Courses :: where($whereData)->first();

        if ($request->hasFile('image')) {

            $image_path = "public/uploads/courses/" . $courses->image;
            $thumbimage_path = "public/uploads/courses/thumbs/" . $courses->image;
            if($courses->image!='no_image'){
                if (file_exists($image_path)) {

                    @unlink($image_path);
                    @unlink($thumbimage_path);
                }}
            $destinationPath = 'public/uploads/courses'; // upload path
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

        if($resut){
            $input['course_key']= $input['course_key'].'_'.$id ;
            $courses->update($input);
        }
        else{
            $courses->update($input);
        }




        Session::flash('success_message', 'You have successfully Updated Course');

        return redirect($this->resource);


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
			$courses = Courses::findOrFail($id);


			$courses->delete();

			Session::flash('success_message', 'Course has been successfully deleted.');

			echo 'success';
		} catch (\Exception $e) {
			return redirect($this->resource);
		}
	} //



	///
	function getCourses() {

		$all_data = Courses::all();

		return Datatables::of($all_data)

			->addColumn('name', function ($single) {
				return $single->name;
			})
            ->addColumn('author_name', function ($single) {
                $id = Hashids::encode($single->id);
                return $single->teacher_name;
            })
            ->addColumn('features', function ($single) {
                $id = Hashids::encode($single->id);
                return '<a '.get_tooltip('Course Features').' href="' . URL::to('admin/courses/course_features/' . $id . '') . '"><i>Content Features</i></a';

            })
            ->addColumn('content_lecture', function ($single) {
                $id = Hashids::encode($single->id);
                return '<a '.get_tooltip('Course Content').' href="' . URL::to('admin/courses/content_lecture/' . $id . '') . '"><i>Content Lecture</i></a';

            })
			->addColumn('course_participants', function ($single) {
				$id = Hashids::encode($single->id);
return '<a '.get_tooltip('Course Participants').' href="' . URL::to('admin/courses/course_participants/' . $id . '') . '"><i>Course Participants</i></a';

			})
            ->addColumn('is_featured', function ($single) {
                if ($single->is_featured == 1) {
                    return '<span data-category-feature="1" class="label label-default course_feature_btn" data-id="'.$single->id.'">Feature</span>';
                }else {
                    return '<span data-category-feature="0" class="label label-default course_feature_btn" data-id="'.$single->id.'">Not Feature</span>';
                }

            })
			->addColumn('action', function ($single) {
				$id = Hashids::encode($single->id);
				$action_html = '';
				$action_html = '<a  '.get_tooltip('Update Course').' href="courses/' . $id . '/edit"><i class="fa fa-edit"></i></a>';
				return $action_html;

			})
			->editColumn('id', 'ID: {{$id}}')
			->rawColumns(['name', 'code','course_content','course_participants', 'action','is_featured', 'content_lecture','features'])
			->make(true);

	}

    /**
     * @param Request $request
     * @return array
     */
    public function makeFeature(Request $request)
    {

        if ($request->is_feature == 1) {

            Courses::where('id', $request->id)->update(['is_featured' => 0]);
            $status = 0;
        } else {
            Courses::where('id', $request->id)->update(['is_featured' => 1]);
            $status = 1;
        }
        return [
            'message' => 'Success',
            'status' => $status
        ];
    }
    public function makeFeatureLecture(Request $request)
    {

        if ($request->is_feature == 1) {

            ContentLecture::where('id', $request->id)->update(['is_featured' => 0]);
            $status = 0;
        } else {
            ContentLecture::where('id', $request->id)->update(['is_featured' => 1]);
            $status = 1;
        }
        return [
            'message' => 'Success',
            'status' => $status
        ];
    }
	///************************CONTENT*************************************/

	public function ShowContent($id, Request $request) {

	//
		try {

			$data['course_id_enc'] = $id;
			$id = Hashids::decode($id)[0];

			$data['class'] = 'courses';
		$data['title'] = 'Manage Courses Content';

		$data['course_id'] = $id;


		$data['resource'] = $this->resource;
		return view($this->view_path . '/content_listing', $data);
		} catch (\Exception $e) {
			return redirect($this->resource);
		}

	}

	public function CreateContent($id, Request $request) {

	//
		try {
			$id = Hashids::decode($id)[0];

			$data['class'] = 'courses';

			$data['title'] = 'Add Content';

		$data['course_id'] = $id;

		$data['content_id'] = $id;
		$data['resource'] = $this->resource;
		return view($this->view_path . '/add_content', $data);
		} catch (\Exception $e) {
			return redirect($this->resource);
		}

	}


	public function SaveContent(Request $request) {
		//
		$input = $request->all();



		$rules['content_title'] = 'required|string|max:255';

		$rules['content_desc'] = 'required';

		$messages = array();

		$this->validate($request, $rules, $messages);


			$userdata['content_title'] = $input['content_title'];

			$userdata['content_desc'] = $input['content_desc'];

			$userdata['course_id'] = $input['course_id'];


			$coursecontent = CoursesContent::create($userdata);


			Session::flash('success_message', 'You have successfully added new course content.');

				$id = Hashids::encode($input['course_id']);

		    	return redirect('admin/courses/course_content/'.$id);

	}


	//

		public function UpdateContent($id,Request $request) {
		//
		$input = $request->all();

		$content = CoursesContent::findOrFail($id);

		$rules['content_title'] = 'required|string|max:255';

		$rules['content_desc'] = 'required';

		$messages = array();

		$this->validate($request, $rules, $messages);


			$userdata['content_title'] = $input['content_title'];

			$userdata['content_desc'] = $input['content_desc'];



			 $content->update($userdata);


			Session::flash('success_message', 'You have successfully updated new course content.');

				$idd = Hashids::encode($input['course_id']);

		    	return redirect('admin/courses/course_content/'.$idd);

	}
	///
	public function EditContent($id, Request $request) {

	//
		try {
			$id = Hashids::decode($id)[0];

			$data['class'] = 'courses';

			$data['title'] = 'Edit Content';







		$data['content'] = CoursesContent::findOrFail($id);

		  $data['course_id'] = $data['content']->course_id;
		$data['content_id'] = $id;
		$data['resource'] = $this->resource;
		return view($this->view_path . '/edit_content', $data);
		} catch (\Exception $e) {
			return redirect($this->resource);
		}

	}

	//

	function getCoursesContent(Request $request) {


         $course_id = $request->course_id;
		$all_data = CoursesContent::where('course_id',$course_id)->get();

		return Datatables::of($all_data)

			->addColumn('name', function ($single) {
				return $single->content_title;
			})
			->addColumn('content_lecture', function ($single) {
				$id = Hashids::encode($single->id);
return '<a '.get_tooltip('Course Content').' href="' . URL::to('admin/courses/content_lecture/' . $id . '') . '"><i>Content
 Lecture</i></a';

			})
			->addColumn('action', function ($single) {
				$id = Hashids::encode($single->id);
				$action_html = '';
				$action_html = '<a  '.get_tooltip('Update Course Content').' href="' . URL::to('admin/courses/edit_content/' . $id . '') . '"><i class="fa fa-edit"></i></a>';
				return $action_html;

			})
			->editColumn('id', 'ID: {{$id}}')
			->rawColumns(['name', 'content_lecture', 'action'])
			->make(true);

	}

	////

	public function ShowParticipants($course_id, Request $request) {

	//
		try {


			$course_id = Hashids::decode($course_id)[0];

			$data['class'] = 'courses';
		   $data['title'] = 'Course Participants';

		   $data['course_id'] = $course_id;


		$data['resource'] = $this->resource;
		return view($this->view_path . '/participants_listing', $data);
		} catch (\Exception $e) {
			return redirect($this->resource);
		}

	}
	//////////////////////////////
    function getCourseParticipants(Request $request) {

        $course_id = $request->course_id;


        $all_data = UserCourse::with(['user_details','course_details'])->where('course_id',$course_id)->get();

        return Datatables::of($all_data)

            ->addColumn('student_name', function ($single) {
                return $single['user_details']->name;
            })
            ->addColumn('email', function ($single) {
                return $single['user_details']->email;
            })
            ->addColumn('paid_date', function ($single) {
                return date('Y-m-d', strtotime($single->created_at));
            })
            ->addColumn('paid_time', function ($single) {
                return Carbon::parse($single->created_at)->format('h:i A');

            })
            ->editColumn('id', 'ID: {{$id}}')
            ->rawColumns(['student_name','email', 'paid_date', 'paid_time'])
            ->make(true);

    }
    function getSubCategory(Request $request){
        $category_id = $request->category_id;
        $sub_categories = getsubCategoryList($category_id);
        $array = [];
        if($sub_categories){
            foreach ($sub_categories as $row){
                $array['key'][] = $row->id;
                $array['value'][] = $row->name;
            }
        }

        return response()->json([
            'data' => $array
        ]);
    }


    ///************************LECTURE*************************************/

    public function ShowLecture($id, Request $request) {

        //
        try {

            $data['course_id'] = $id;
            $id = Hashids::decode($id)[0];

            $data['class'] = 'courses';
            $data['title'] = 'Manage Lecture';

            $data['content_id'] = $id;


            $data['resource'] = $this->resource;
            return view($this->view_path . '/lecture_listing', $data);
        } catch (\Exception $e) {
            return redirect($this->resource);
        }

    }

    public function CreateLecture($content_id, Request $request) {

        //
        try {
            $content_id = Hashids::decode($content_id)[0];

            $data['class'] = 'courses';

            $data['title'] = 'Add Lecture';

            $data['course_id'] = $content_id;

            $data['resource'] = $this->resource;
            return view($this->view_path . '/add_lecture', $data);
        } catch (\Exception $e) {
            return redirect($this->resource);
        }

    }


    public function SaveLecture(Request $request, $course_id) {
        //
        $rules['title'] = 'required|string|max:255';


        $messages = array();

        $this->validate($request, $rules, $messages);

        $course_lec['title'] = $request->title;
        $course_lec['file_type']  = $request->file_type;
        $course_lec['course_id'] = $course_id;
        if( $request->file_type == 'file') {
            if ($_FILES['file_name']['name'] != '') {
                $img = $_FILES['file_name']['name'];
                $tmp = $_FILES['file_name']['tmp_name'];

                $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

                // can upload same image using rand function
                $final_image = rand(1000, 1000000) . $img;
                // check's valid format

                $path = public_path('uploads/lecture/' . $final_image);
                if (move_uploaded_file($tmp, $path)) {
                    $course_lec['file_name'] = $final_image;
                    $course_lec['file_time'] = $this->getVideoDuration($path);
                }
            }
        }else{

            $course_lec['file_time'] = $this->getYoutubeDuration($request->file_name);
            $url = str_replace("https://www.youtube.com/watch?v=", "https://www.youtube.com/embed/", $request->file_name);
            $course_lec['file_name'] = $url;

        }
        if ($request->hasFile('image_cover')) {

            $destinationPath = 'public/uploads/lecture_cover/'; // upload path
            $image = $request->file('image_cover'); // file
            $extension = $image->getClientOriginalExtension(); // getting image extension
            $fileName = str_random(12) . '.' . $extension; // renameing image
            $img = Image::make($image->getRealPath());
            $img->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/thumbs/' . $fileName);
            $image->move($destinationPath, $fileName); // uploading file to given path
            $course_lec['image_cover'] = $fileName;
        }
        $lecture = ContentLecture::create($course_lec);
        Session::flash('success_message', 'You have successfully added new lecture.');

        $cid = Hashids::encode($lecture->course_id);

        return redirect('admin/courses/content_lecture/'.$cid);

    }

    //

    public function UpdateLecture($id,Request $request) {
        //
        $input = $request->all();

        $rules['title'] = 'required|string|max:255';


        $messages = array();

        $this->validate($request, $rules, $messages);

        $course_lec['title'] = $request->title;
        $course_lec['file_type']  = $request->file_type;

        if( $request->file_type == 'file') {
            if ($_FILES['file_name']['name'] != '') {
                $img = $_FILES['file_name']['name'];
                $tmp = $_FILES['file_name']['tmp_name'];

                $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

                // can upload same image using rand function
                $final_image = rand(1000, 1000000) . $img;
                // check's valid format

                $path = public_path('uploads/lecture/' . $final_image);
                if (move_uploaded_file($tmp, $path)) {
                    $course_lec['file_name'] = $final_image;
                    $course_lec['file_time'] = $this->getVideoDuration($path);

                    $exist_lec = ContentLecture::where('id', $request->lecture_id)->first();
                    $file = $exist_lec->file_name;
                    $filename = public_path('uploads/lecture/' . $file);
                    File::delete($filename);

                    $thumbname = public_path('uploads/lecture/thumbs/' . $file);
                    File::delete($thumbname);

                }
            }
        }else{

            $course_lec['file_time'] = $this->getYoutubeDuration($request->file_name);
            $url = str_replace("https://www.youtube.com/watch?v=", "https://www.youtube.com/embed/", $request->file_name);
            $course_lec['file_name'] = $url;

        }
        if ($request->hasFile('image_cover')) {

            $destinationPath = 'public/uploads/lecture_cover/'; // upload path
            $image = $request->file('image_cover'); // file
            $extension = $image->getClientOriginalExtension(); // getting image extension
            $fileName = str_random(12) . '.' . $extension; // renameing image
            $img = Image::make($image->getRealPath());
            $img->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/thumbs/' . $fileName);
            $image->move($destinationPath, $fileName); // uploading file to given path
            $course_lec['image_cover'] = $fileName;
        }
        ContentLecture::where('id', $request->lecture_id)->update($course_lec);

        $lectures = ContentLecture::where('id', $request->lecture_id)->first();
        $course_id = $lectures->course_id;
        Session::flash('success_message', 'You have successfully updated lecture.');

        $idd = Hashids::encode($course_id);

        return redirect('admin/courses/content_lecture/'.$idd);

    }

    public function getYoutubeDuration($url) {
        $video_id = explode("?v=", $url);
        if(isset($video_id[1])) {
            $youtube_id = $video_id[1];
        }else {
            $video_id = explode("/embed/", $url);
            if(isset($video_id[1])) {
                $youtube_id = $video_id[1];
            }else {
                return 0;
            }
        }
        $url = 'https://www.googleapis.com/youtube/v3/videos?id='.$youtube_id.'&key=AIzaSyCCc7TacZzH7jN4s3SssuuEfhI9hYZe8Do&part=contentDetails';


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        $response_a = json_decode($response);
        //return 0;
        $VidDuration = $response_a->items[0]->contentDetails->duration;

        preg_match_all('/(\d+)/', $VidDuration, $parts);
        $hours = intval(floor(@$parts[0][0]/60) * 60 * 60);
        $minutes = intval(@$parts[0][0]%60 * 60);
        $seconds = intval(@$parts[0][1]);
        $totalSec = $hours + $minutes + $seconds; // This is the example in seconds
        return $totalSec;

    }

    function getVideoDuration($file){
        if (file_exists($file)){
            $getID3 = new \getID3;
            $file = $getID3->analyze($file);
            $duration = $file['playtime_seconds'];
            return $duration;
        }
        else {
            return 0;
        }
    }


    ///
    public function EditLecture($lecture_id, Request $request) {

        //
        try {
            $lecture_id = Hashids::decode($lecture_id)[0];

            $data['class'] = 'courses';

            $data['title'] = 'Edit lecture';



            $data['lecture'] = ContentLecture::findOrFail($lecture_id);

            $data['course_id'] = $data['lecture']->course_id;
            $data['content_id'] =  $data['lecture']->course_content_id;
            $data['resource'] = $this->resource;
            return view($this->view_path . '/edit_lecture', $data);
        } catch (\Exception $e) {
            return redirect($this->resource);
        }

    }

    //

    function getCoursesContentLecture(Request $request) {

        $content_id = $request->content_id;


        $all_data = ContentLecture::where('course_id',$content_id)->get();

        return Datatables::of($all_data)

            ->addColumn('title', function ($single) {
                return $single->title;
            })
            ->addColumn('is_featured', function ($single) {
                if ($single->is_featured == 1) {
                    return '<span data-lecture-feature="1" class="label label-default courseContent_feature_btn" data-id="'.$single->id.'">Feature</span>';
                }else {
                    return '<span data-lecture-feature="0" class="label label-default courseContent_feature_btn" data-id="'.$single->id.'">Not Feature</span>';
                }

            })
            ->addColumn('action', function ($single) {
                $id = Hashids::encode($single->id);
                $action_html = '';
                $action_html = '<a  '.get_tooltip('Update Lecture').' href="' . URL::to('admin/courses/edit_lecture/' . $id . '') . '"><i class="fa fa-edit"></i></a>';
                $action_html .= '<a  '.get_tooltip('Delete Lecture').' href="javascript:void(0);" onclick="delete_record(\'' . $id . '\')"><i class="fa fa-trash-o"></i></a>';
                return $action_html;

            })
            ->editColumn('id', 'ID: {{$id}}')
            ->rawColumns(['title', 'action','is_featured'])
            ->make(true);

    }

    function deleteLecture($id){
        $id = Hashids::decode($id)[0];
        $lecture = ContentLecture::where('id', $id)->first();
        $lecture_file       = $lecture->file_name;
        $lecture_filename   = public_path('uploads/lecture/'.$lecture_file);
        File::delete($lecture_filename);

        $lecture_thumbname   = public_path('uploads/lecture/thumbs/'.$lecture_file);
        File::delete($lecture_thumbname);

        $file       = $lecture->image_cover;
        $filename   = public_path('uploads/lecture_cover/'.$file);
        File::delete($filename);

        $thumbname   = public_path('uploads/lecture_cover/thumbs/'.$file);
        File::delete($thumbname);

        ContentLecture::where('id', $id)->delete();
        Session::flash('success_message', 'Lecture has been successfully deleted.');
        return 'success';
    }

    public function getCourseFeature($id, Request $request){
        try {

            $data['course_id'] = $id;
            $id = Hashids::decode($id)[0];

            $data['class'] = 'courses';
            $data['title'] = 'Manage Feature';

            $data['content_id'] = $id;


            $data['resource'] = $this->resource;
            return view($this->view_path . '/feature_listing', $data);
        } catch (\Exception $e) {
            return redirect($this->resource);
        }
    }

    function getAjaxCourseFeature(Request $request) {


        $content_id = $request->content_id;


        $all_data = CourseFeature::where('course_id',$content_id)->get();


        return Datatables::of($all_data)

            ->addColumn('feature_key', function ($single) {
                return $single->feature_key;
            })
            ->addColumn('feature_value', function ($single) {
                return $single->feature_value;
            })
            ->addColumn('action', function ($single) {
                $id = Hashids::encode($single->id);
                $action_html = '';
                $action_html .= '<a  '.get_tooltip('Delete Feature').' href="javascript:void(0);" onclick="delete_record(\'' . $id . '\')"><i class="fa fa-trash-o"></i></a>';
                return $action_html;

            })
            ->editColumn('id', 'ID: {{$id}}')
            ->rawColumns(['feature_key', 'feature_value','action'])
            ->make(true);
    }

    function deleteCourseFeature($id){
        $id = Hashids::decode($id)[0];


        CourseFeature::where('id', $id)->delete();
        Session::flash('success_message', 'Feature has been successfully deleted.');
        return 'success';
    }
}
