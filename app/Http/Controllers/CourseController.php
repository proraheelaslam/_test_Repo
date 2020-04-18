<?php

namespace App\Http\Controllers;

use App\Models\CourseBookmarks;
use App\Models\Notification;
use App\Models\ShoppingCart;
use App\Models\UserViews;
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

use App\Models\Courses;
use App\Models\ContentLecture;
use App\Models\CourseFeature;
use App\Models\UserCourse;
use App\Models\CourseReview;
use App\Models\CourseQuestion;
class CourseController extends Controller
{
    //
	public function __construct()
    {
        $this->middleware('preventBackHistory');
	}

	//To show Course Listing View
    public function  index(){

        $user = Auth::user();

        return view('student.courses.listing',compact('user'));

    }

    public function create(){
        return view('student.courses.add');
    }

    public function store(Request $request){


        $authenticated_user = Auth::user();

        $rules = [
            'course_title' => 'required|max:255',
            'course_price' => 'required',
            'course_start' => 'required',
            'teacher_name' => 'required',
            'course_picture' => 'required|image|mimes:jpg,png,jpeg',
            'category' => 'required',
            'sub_category' => 'required',
            'course_skills' => 'required',
            'description' => 'required',
        ];
        $this->validate($request, $rules);

        $input['student_id'] = $authenticated_user->id;
        $input['name'] = $request->course_title;
        $input['course_price'] = isset($request->course_price)?$request->course_price:0;
        $input['course_start'] = isset($request->course_start)?Carbon::parse($request->course_start):null;
        $input['course_expire'] = isset($request->course_expire)?Carbon::parse($request->course_expire):null;
        $input['teacher_name'] = isset($request->teacher_name)?$request->teacher_name:null;
        $input['course_key'] = str_slug($request->course_title, '-');
        $input['category_id'] = $request->category;
        $input['sub_category_id'] = $request->sub_category;
        $input['description'] = isset($request->description)?$request->description:null;
        $input['is_free'] = isset($request->is_free)?$request->is_free:0;
        $input['course_skills'] = isset($request->course_skills)? $request->course_skills:'beginner';
        $input['course_tags'] = isset($request->tags)?$request->tags:null;
        $input['is_live_stream'] = isset($request->is_live_stream)?$request->is_live_stream:0;
        $input['streaming_date'] = isset($request->streaming_date)?$request->streaming_date:null;
        $input['start_streaming_time'] = isset($request->start_streaming_time)?date('H:i:s', strtotime($request->start_streaming_time)):null;
        $input['end_streaming_time'] = isset($request->end_streaming_time)?date('H:i:s', strtotime($request->end_streaming_time)):null;

        if($request->hasFile('course_picture')){
            $image_tmp = $request->file('course_picture');
            if ($image_tmp->isValid()) {
                // Upload Images after Resize
                $extension = $image_tmp->getClientOriginalExtension();
                $fileName = rand(111,99999).'.'.$extension;

                $large_image_path = public_path('uploads/courses/'.$fileName);
                Image::make($image_tmp)->save($large_image_path);
                $small_image_path = public_path('uploads/courses/thumbs/'.$fileName);
                Image::make($image_tmp)->resize(50, 50)->save($small_image_path);

                $input['image'] = $fileName;
            }

        }

        $courses = Courses::create($input);

        if(isset($request->course_name) && count($request->course_name)>0){

            for($i=0; $i<count($request->course_name); $i++){
                $course_lec = [];
                if($request->course_name[$i]!=''){
                    $course_lec['title'] = $request->course_name[$i];
                    $course_lec['course_id'] = $courses->id;
                    $course_lec['file_type'] = $request->video_type[$i];

                    if( $request->video_type[$i] == 'file'){
                        if($_FILES['video_url']['name'][$i]!=''){
                            $img = $_FILES['video_url']['name'][$i];
                            $tmp = $_FILES['video_url']['tmp_name'][$i];
                            $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

                            // can upload same image using rand function
                            $final_image = rand(1000,1000000).$img;
                            // check's valid format

                            $path  = public_path('uploads/lecture/'.$final_image);
                            if(move_uploaded_file($tmp,$path))
                            {
                                $course_lec['file_name'] = $final_image;
                                $course_lec['file_time'] =$this->getVideoDuration($path);
                            }
                        }
                        else{
                            $course_lec['file_name'] = '';
                            $course_lec['file_time'] = 0;
                        }
                    }else{

                        $course_lec['file_time'] = $this->getYoutubeDuration($request->video_url[$i]);
                         $url = str_replace("https://www.youtube.com/watch?v=", "https://www.youtube.com/embed/", $request->video_url[$i]);
                        $course_lec['file_name'] = $url;

                    }


                    if($_FILES['image_cover']['name'][$i] != ''){
                        $image_cover = $_FILES['image_cover']['name'][$i];
                        $image_tmp = $_FILES['image_cover']['tmp_name'][$i];
                        $ext = strtolower(pathinfo($image_cover, PATHINFO_EXTENSION));

                        // can upload same image using rand function
                        $final_image_cover = rand(1000,1000000).$image_cover;
                        // check's valid format

                        $path = $large_image_path = public_path('uploads/lecture_cover/'.$final_image_cover);
                        if(move_uploaded_file($image_tmp,$path))
                        {
                            $course_lec['image_cover'] = $final_image_cover;
                        }

                    }else{
                        $course_lec['image_cover']  = 'no_image.png';
                    }

                    ContentLecture::create($course_lec);
                }

            }
        }
       $deletedRows = CourseFeature::where('course_id',$courses->id)->delete();
        if(isset($_POST['course_key'])){
            $value_key=$_POST['course_value'];

            if (is_array($_POST['course_key'])) {

                foreach($_POST['course_key'] as $key => $value){
                    $feature['course_id']=$courses->id;
                    $feature['feature_key']=$value;
                    $feature['feature_value']=(isset($value_key[$key]))?$value_key[$key]:'';
                    CourseFeature::create($feature);
                }
            }
        }
        $this->sendNotificationFollowers($courses->id);
        $data['message'] = Lang::get('messages.Course has been added successfully.');
        Session::flash('success_message', $data['message']);
        return redirect('/student/my_courses');

    }

    public function edit($id){

	    $id = Hashids::decode($id)[0];
	    $course = Courses::with('course_features', 'course_lectures')->where('id', $id)->first();

        return view('student.courses.edit', compact('id', 'course'));
    }

    public function update(Request $request){
        $authenticated_user = Auth::user();

        $rules = [
            'course_title' => 'required|max:255',
            'course_price' => 'required',
            'course_start' => 'required',
            'teacher_name' => 'required',
            'category' => 'required',
            'sub_category' => 'required',
            'course_skills' => 'required',
            'description' => 'required',
        ];
        $this->validate($request, $rules);


        $exist_course = Courses::where('id', '=', $request->course_id)->first();

        if($exist_course){
            $input['student_id'] = $authenticated_user->id;
            $input['name'] = $request->course_title;
            $input['course_price'] = isset($request->course_price)?$request->course_price:0;
            $input['course_start'] = isset($request->course_start)?Carbon::parse($request->course_start):null;
            $input['course_expire'] = isset($request->course_expire)?Carbon::parse($request->course_expire):null;
            $input['teacher_name'] = isset($request->teacher_name)?$request->teacher_name:null;
            $input['course_key'] = str_slug($request->course_title, '-');
            $input['category_id'] = $request->category;
            $input['sub_category_id'] = $request->sub_category;
            $input['description'] = isset($request->description)?$request->description:null;
            $input['is_free'] = isset($request->is_free)?$request->is_free:0;
            $input['course_skills'] = isset($request->course_skills)? $request->course_skills:'beginner';
            $input['course_tags'] = isset($request->tags)?$request->tags:null;
            $input['is_live_stream'] = isset($request->is_live_stream)?$request->is_live_stream:0;
            $input['streaming_date'] = isset($request->streaming_date)?$request->streaming_date:null;
            $input['start_streaming_time'] = isset($request->start_streaming_time)?date('H:i:s', strtotime($request->start_streaming_time)):null;
            $input['end_streaming_time'] = isset($request->end_streaming_time)?date('H:i:s', strtotime($request->end_streaming_time)):null;

            if($request->hasFile('course_picture')){
                $image_tmp = $request->file('course_picture');
                if ($image_tmp->isValid()) {
                    // Upload Images after Resize
                    $extension = $image_tmp->getClientOriginalExtension();
                    $fileName = rand(111,99999).'.'.$extension;

                    $large_image_path = public_path('uploads/courses/'.$fileName);
                    Image::make($image_tmp)->save($large_image_path);
                    $small_image_path = public_path('uploads/courses/thumbs/'.$fileName);
                    Image::make($image_tmp)->resize(50, 50)->save($small_image_path);

                    $input['image'] = $fileName;
                }

                //delete image file from upload folder which is send from edit view throught hidden field with the name current_image.
                $file       = $exist_course->image;
                $filename   = public_path('uploads/courses/'.$file);
                 File::delete($filename);

                 $thumbname   = public_path('uploads/courses/thumbs/'.$file);
                 File::delete($thumbname);

            }

            Courses::where('id', '=' ,$request->course_id)->update($input);

            //Course Content Lecture
            if(isset($request->lecture_id) && count($request->lecture_id)>0){

                ContentLecture::whereNotIn('id', $request->lecture_id)->where('course_id', '=' ,$request->course_id)->delete();

            }

            if(isset($request->course_name) && count($request->course_name)>0){

                for($i=0; $i<count($request->course_name); $i++){
                    $course_lec = [];
                    if($request->course_name[$i]!=''){
                        if(isset($request->lecture_id[$i])){
                            $course_lec['title'] = $request->course_name[$i];
                            $course_lec['course_id'] = $request->course_id;
                            $course_lec['file_type'] = $request->video_type[$i];

                            if( $request->video_type[$i] == 'file'){
                                if($_FILES['video_url']['name'][$i]!=''){
                                    $img = $_FILES['video_url']['name'][$i];
                                    $tmp = $_FILES['video_url']['tmp_name'][$i];
                                    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

                                    // can upload same image using rand function
                                    $final_image = rand(1000,1000000).$img;
                                    // check's valid format

                                    $path  = public_path('uploads/lecture/'.$final_image);
                                    if(move_uploaded_file($tmp,$path))
                                    {
                                        $course_lec['file_name'] = $final_image;
                                        $course_lec['file_time'] =$this->getVideoDuration($path);

                                        $exist_lec = ContentLecture::where('id',$request->lecture_id[$i])->first();
                                        $file       = $exist_lec->file_name;
                                        $filename   = public_path('uploads/lecture/'.$file);
                                         File::delete($filename);

                                        $thumbname   = public_path('uploads/lecture/thumbs/'.$file);
                                        File::delete($thumbname);



                                    }
                                }
                            }else{

                                $course_lec['file_time'] = $this->getYoutubeDuration($request->video_url[$i]);
                                $url = str_replace("https://www.youtube.com/watch?v=", "https://www.youtube.com/embed/", $request->video_url[$i]);
                                $course_lec['file_name'] = $url;

                            }

                            if($_FILES['image_cover']['name'][$i] != ''){
                                $image_cover = $_FILES['image_cover']['name'][$i];
                                $image_tmp = $_FILES['image_cover']['tmp_name'][$i];
                                $ext = strtolower(pathinfo($image_cover, PATHINFO_EXTENSION));

                                // can upload same image using rand function
                                $final_image_cover = rand(1000,1000000).$image_cover;
                                // check's valid format

                                $path = $large_image_path = public_path('uploads/lecture_cover/'.$final_image_cover);
                                if(move_uploaded_file($image_tmp,$path))
                                {
                                    $course_lec['image_cover'] = $final_image_cover;

                                    $exist_lec = ContentLecture::where('id',$request->lecture_id[$i])->first();
                                    $file       = $exist_lec->image_cover;
                                    $filename   = public_path('uploads/lecture_cover/'.$file);
                                    File::delete($filename);

                                    $thumbname   = public_path('uploads/lecture_cover/thumbs/'.$file);
                                    File::delete($thumbname);
                                }

                            }

                            ContentLecture::where('id', $request->lecture_id[$i])->update($course_lec);
                        }
                        else{

                            $course_lec['title'] = $request->course_name[$i];
                            $course_lec['course_id'] = $request->course_id;
                            $course_lec['file_type'] = $request->video_type[$i];
                            if( $request->video_type[$i] == 'file'){
                                if($_FILES['video_url']['name'][$i]!=''){
                                    $img = $_FILES['video_url']['name'][$i];
                                    $tmp = $_FILES['video_url']['tmp_name'][$i];
                                    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

                                    // can upload same image using rand function
                                    $final_image = rand(1000,1000000).$img;
                                    // check's valid format

                                    $path  = public_path('uploads/lecture/'.$final_image);
                                    if(move_uploaded_file($tmp,$path))
                                    {
                                        $course_lec['file_name'] = $final_image;
                                        $course_lec['file_time'] =$this->getVideoDuration($path);
                                    }
                                }
                                else{
                                    $course_lec['file_name'] = '';
                                    $course_lec['file_time'] = 0;
                                }
                            }else{

                                $course_lec['file_time'] = $this->getYoutubeDuration($request->video_url[$i]);
                                $url = str_replace("https://www.youtube.com/watch?v=", "https://www.youtube.com/embed/", $request->video_url[$i]);
                                $course_lec['file_name'] = $url;

                            }

                            if($_FILES['image_cover']['name'][$i] != ''){
                                $image_cover = $_FILES['image_cover']['name'][$i];
                                $image_tmp = $_FILES['image_cover']['tmp_name'][$i];
                                $ext = strtolower(pathinfo($image_cover, PATHINFO_EXTENSION));

                                // can upload same image using rand function
                                $final_image_cover = rand(1000,1000000).$image_cover;
                                // check's valid format

                                $path = $large_image_path = public_path('uploads/lecture_cover/'.$final_image_cover);
                                if(move_uploaded_file($image_tmp,$path))
                                {
                                    $course_lec['image_cover'] = $final_image_cover;
                                }

                            }else{
                                $course_lec['image_cover']  = 'no_image.png';
                            }

                            ContentLecture::create($course_lec);


                        }

                    }

                }
            }

            //Course Features

            if(isset($_POST['course_key'])){
                $value_key=$_POST['course_value'];

                if (is_array($_POST['course_key'])) {

                    foreach($_POST['course_key'] as $key => $value){
                        if(isset($request->feature_id[$key])){
                            $feature['course_id']=$request->course_id;
                            $feature['feature_key']=$value;
                            $feature['feature_value']=(isset($value_key[$key]))?$value_key[$key]:'';
                            CourseFeature::where('id', $request->feature_id[$key])->update($feature);
                        }else{
                            $feature['course_id']=$request->course_id;
                            $feature['feature_key']=$value;
                            $feature['feature_value']=(isset($value_key[$key]))?$value_key[$key]:'';
                            CourseFeature::create($feature);
                        }
                    }
                }
            }

            $data['message'] = Lang::get('messages.Course has been updated successfully.');
            Session::flash('success_message', $data['message']);
        }else{
            $data['message'] = Lang::get('messages.Course does not exist.');
            Session::flash('error_message', $data['message']);
        }

        return redirect('/student/my_courses');

    }


    public function getSubCategory(Request $request){
	    $category_id = $request->category_id;
        $sub_categories = getsubCategoryList($category_id);
        return response()->json([
            'data' => view('student/courses/subcategories')->with('sub_categories',$sub_categories)->render()
        ]);
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
        $url = 'https://www.googleapis.com/youtube/v3/videos?id='.$youtube_id.'&key=AIzaSyCCc7TacZzH7jN4s3SssuuEfhI9hYZe8Do&part=snippet,contentDetails';


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
/*
            ## open and read video file
            $handle = fopen($file, "r");
            ## read video file size
            $contents = fread($handle, filesize($file));
            fclose($handle);
            $make_hexa = hexdec(bin2hex(substr($contents,strlen($contents)-3)));
            $duration = 0;
            if (strlen($contents) > $make_hexa){
                $duration = hexdec(bin2hex(substr($contents,strlen($contents)-$make_hexa,3))) ;
            }
            return $duration;*/
        }
        else {
           return 0;
        }
    }

    //To show ajax view and filters
    public function searchCourse(Request $request){
	    $user = Auth::user();

	    $search_key = '';
	    $filtered_key = '';
        $search_user_course_key = '';
        $filtered_user_course_key = '';

	    if(isset($request->search_key)){
            $search_key = $request->search_key;
        }
        if(isset($request->filtered_key)){
            $filtered_key = $request->filtered_key;
        }
        $courses = Courses::with('course_lectures', 'instructor_detail')
                            ->where('student_id', $user->id);

        if($search_key!=''){
            $courses->where('name', 'like', '%'.$search_key.'%');
        }

        if($filtered_key=='latest'){
            $courses->orderBy('created_at', 'desc');
        }else{
            $courses->orderBy('course_start', 'desc');
        }

        $courses  =  $courses->get();

        $data['courses'] = $courses;
        $data['search_key'] = $search_key;
        $data['user'] = $user;


        return response()->json([
            'data' => view('student/courses/courses_list')->with('data',$data)->render()
        ]);
    }

    //To show ajax view and filters
    public function searchMyCourse(Request $request){
        $user = Auth::user();

        $search_user_course_key = '';
        $filtered_user_course_key = '';

        if(isset($request->search_user_course_key)) {
            $search_user_course_key = $request->search_user_course_key;
        }
        if(isset($request->filtered_user_course_key)) {
            $filtered_user_course_key = $request->filtered_user_course_key;
        }

        $user_course = UserCourse::where('user_id', $user->id)->get();
        $course_array = [];
        foreach ($user_course as $single_course){
            $course_array[] = $single_course->course_id;
        }
        $user_courses = Courses::with('course_lectures', 'instructor_detail')->whereIn('id', $course_array);

        if($search_user_course_key!=''){
            $user_courses->where('name', 'like', '%'.$search_user_course_key.'%');
        }

        if($filtered_user_course_key=='oldest'){
            $user_courses->orderBy('created_at', 'asc');
        }else{
            $user_courses->orderBy('created_at', 'desc');
        }

        $user_courses  =  $user_courses->get();


        $data['user'] = $user;
        $data['user_courses'] = $user_courses;
        $data['search_user_course_key'] = $search_user_course_key;

        return response()->json([
            'data' => view('student/courses/my_courses_list')->with('data',$data)->render()
        ]);
    }

    public function deleteCourse($id=0){
	    $id = Hashids::decode($id)[0];
	    $courses = Courses::with('course_lectures')->where('id', $id)->first();
	    if($courses){
	        $file = $courses->image;
            $filename   = public_path('uploads/courses/'.$file);
            File::delete($filename);

            $thumbname   = public_path('uploads/courses/thumbs/'.$file);
            File::delete($thumbname);

            foreach ($courses->course_lectures as $row){

                $lecture_file       = $row->file_name;
                $lecture_filename   = public_path('uploads/lecture/'.$lecture_file);
                File::delete($lecture_filename);

                $lecture_thumbname   = public_path('uploads/lecture/thumbs/'.$lecture_file);
                File::delete($lecture_thumbname);

                $file       = $row->image_cover;
                $filename   = public_path('uploads/lecture_cover/'.$file);
                File::delete($filename);

                $thumbname   = public_path('uploads/lecture_cover/thumbs/'.$file);
                File::delete($thumbname);
            }

            Courses::where('id', $id)->delete();
            ContentLecture::where('course_id', $id)->delete();
            CourseFeature::where('course_id', $id)->delete();
            CourseReview::where('course_id',$id)->delete();
            UserCourse::where('course_id', $id)->delete();
        }

        return response()->json([$id]);
    }

    public function courseVideo($id){

	    $id = Hashids::decode($id)[0];


	    $course = Courses::with('instructor_detail', 'course_lectures', 'featured_videos')->where('id', $id)->first();
        $all_questions = getAllQuestion($id);

        $shopping_cart = ShoppingCart::with('order_details')
            ->where('course_id', $course->id)
            ->where('student_id',@Auth::user()->id)
            ->first();
        if(@$shopping_cart['order_details']){
            $status = $shopping_cart['order_details']->order_status;
        }else{
            $status = 'Pending';
        }
        $course->course_status = $status;

	    return view('student.courses.course_video',compact('course', 'all_questions'));

    }

    public function getAnswer(Request $request){
        $course_id = $request->id;
        $question = $request->question;
        $course_question = CourseQuestion::where('course_id', $course_id)->where('question', 'like', $question)->first();
        return response()->json(['data' => $course_question]);
    }

    public function saveAnswer(Request $request){
	    $input['course_id'] = $request->course_id;
	    $input['question'] = $request->question;
	    $input['answer'] = $request->answer;
	    $input['student_id'] = Auth::user()->id;
	    CourseQuestion::create($input);
        return response()->json(['data' => true]);

    }


    function bookmarkCourse(Request $request){
        $user_id = 0 ;
        $input['course_id'] = $request->course_id;
        if(@Auth::guard('student')->user()){
            $user_id = @Auth::guard('student')->user()->id;
        }
        $ip = getUniqueSessionId();

        $course_bookmarked = CourseBookmarks::where('course_id', $input['course_id'])
            ->where(function($query) use($user_id,$ip){
                return $query->where('user_id', $user_id)
                    ->orWhere('ip',$ip );

            })->first();
        $input['user_id'] = $user_id;
        $input['ip'] = $ip;
        if($course_bookmarked){
            CourseBookmarks::where('id', $course_bookmarked->id)->delete();
            $status = false;

        }else{
            CourseBookmarks::create($input);
            $status = true;
        }

        return response()->json(['data' => $status]);
    }

    function increaseProfileViews(Request $request){

        $input['to_id'] = $request->student_id;
        UserViews::create($input);
        return response()->json(['data' => true]);

    }
    function sendNotificationFollowers($course_id){
        if($course_id!=0 && $course_id!=''){
            $created_course = Courses::with('instructor_detail')->where('id', $course_id)->first();

            $existing_courses = Courses::where('student_id', $created_course->student_id)->pluck('id')->toArray();

            $user_courses  =UserCourse::whereIn('course_id', $existing_courses)->get();
            if($user_courses){

                $notification['course_id'] = $course_id;
                $notification['subject'] = 'New Course Created';
                $notification['notification'] = ucfirst($created_course['instructor_detail']['name']).' has been created a new course '.ucfirst($created_course['name']);
                $notification['is_read'] = 0;

                foreach($user_courses as $row){
                    $notification['to_id'] = $row->user_id;
                    Notification::create($notification);
                }
            }
        }
        return true;
    }
}
