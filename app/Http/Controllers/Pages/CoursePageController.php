<?php

namespace App\Http\Controllers\Pages;

use App\Models\CourseReview;
use App\Models\Courses;
use App\Models\UserCourse;
use Hashids;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class CoursePageController extends Controller
{
    //
    public function getCourseDetail(Request $request){


        $id = Hashids::decode($request->id);
        $courseDetail = Courses::with(['instructor.instructor_reviews','categories','course_features',
                                           'course_lectures','course_reviews.course_review_student','course_participants'])
                                 ->with(['instructor'=>function($query){
                                     $query->withCount('instructor_courses');
                                 }])->with(['course_reviews'=> function($q){
                                              $q->orderBy('review_time', 'desc')->take(10);
                                  }])
                                 ->where('id', $id)->first();
          //  return $courseDetail;
            Session::put('previous_search_url', Url::previous());

            $is_join_enabled = false;

            if(@Auth::guard('student')->user()){

                if($courseDetail->is_live_stream==1){

                    if(date('Y-m-d') == date('Y-m-d', strtotime($courseDetail->streaming_date))){

                        if((date('H:i:s') >= date('H:i:s', strtotime($courseDetail->start_streaming_time))) && (date('H:i:s') <= date('H:i:s', strtotime($courseDetail->end_streaming_time))))
                        {
                            $user_course = UserCourse::where('course_id', $courseDetail->id)->where('user_id', Auth::guard('student')->user()->id)->first();
                            if($user_course  || @Auth::guard('student')->user()->id==$courseDetail->student_id) {
                                $is_join_enabled = true;
                            }
                        }
                    }

                }

            }
        if ($request->ajax()) {
            return [
                'status' => true,
                'view' => view('student.pages.load_students_feedback', compact('courseDetail', 'is_join_enabled'))->render()
                ];
        }else{
            return view('student.pages.course_detail_page', compact('courseDetail', 'is_join_enabled'));
        }

    }


    /**
     * @param Request $request
     * @return array
     */
    public function addCourseReview(Request $request){

        $review = CourseReview::where([
                    ['course_id' , $request->courseId],
                    ['student_id' , $request->studentId]
                ])->first();

        if (is_null($review)) {

            $courseReview = new CourseReview();
            $courseReview->course_id = $request->courseId;
            $courseReview->student_id = $request->studentId;
            $courseReview->instructor_id = $request->instructorId;
            $courseReview->title = $request->review_title;
            $courseReview->content = $request->review_content;
            $courseReview->rating = $request->rating;
            $courseReview->review_time = now();
            $courseReview->save();
            $status = true;
            $msg = 'Review has been submitted';

        }else {
            $status = false;
            $msg = 'You have already submit review';
        }
        return [
            'status' => $status,
            'message' => $msg
        ];
    }

    /**
     * @param Request $request
     * @return array
     * @throws \Throwable
     */
    public function loadMoreCourseReviews(Request $request){

        $id = $request->id;
        $courseDetail = Courses::with(['course_reviews.course_review_student'])
                               ->with(['course_reviews' => function($q){
                                        $q->orderBy('review_time', 'desc');
                               }])->where('id',$id)
                               ->orderBy('created_at','DESC')->first();
        $courses  = [];
        return [
            'status' => true,
            'data' => $courseDetail,
            'view' => view('student.pages.load_student_reviews', compact('courseDetail','courses'))->render(),
        ];

    }
}
