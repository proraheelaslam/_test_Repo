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

use App\Models\Orders;
use App\Models\ShoppingCart;

class OrderController extends Controller
{
    //
	public function __construct()
    {
        $this->middleware('preventBackHistory');
	}

    public function  index(){

        $user = Auth::user();
        $orders = Orders::where('student_id', $user->id)->get();
        return view('student.orders.listing',compact('user', 'orders'));

    }

    public function getOrderDetail(Request $request){

	    $order_id = $request->id;
        $order_detail = Orders::with('shopping_carts','shopping_carts.course_details')->where('id', $order_id)->first();
	    $data['order_detail'] = $order_detail;
        return response()->json([
            'data' => view('student/orders/order_detail')->with('data',$data)->render()
        ]);
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
        $input['course_key'] = str_replace(" ", "_", strtolower($request->course_title));
        $input['category_id'] = $request->category;
        $input['sub_category_id'] = $request->sub_category;
        $input['description'] = isset($request->description)?$request->description:null;
        $input['is_free'] = isset($request->is_free)?$request->is_free:0;
        $input['course_skills'] = isset($request->course_skills)? $request->course_skills:'beginner';

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
                        $course_lec['file_name'] = $request->video_url[$i];

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

        $data['message'] = Lang::get('messages.Course has been added successfully.');
        Session::flash('success_message', $data['message']);
        return redirect('/student/courses/add_listing');

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

        $youtube_id = $video_id[1];


        $url = 'https://www.googleapis.com/youtube/v3/videos?id='.$youtube_id.'&key=AIzaSyDYwPzLevXauI-kTSVXTLroLyHEONuF9Rw&part=snippet,contentDetails';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        $response_a = json_decode($response);

        return 0;
        //return  $response_a->items[0]->contentDetails->duration; //get video duaration
    }

    function getVideoDuration($file){
        if (file_exists($file)){
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
            return $duration;
        }
        else {
           return 0;
        }
    }
}
