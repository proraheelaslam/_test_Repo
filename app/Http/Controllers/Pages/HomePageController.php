<?php

namespace App\Http\Controllers\Pages;

use App\Models\Categories;
use App\Models\ContentLecture;
use App\Models\Courses;
use App\Models\NewsLetter;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomePageController extends Controller
{


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){

        $cateCoursesData = Categories::with(['courses' => function($q){
                                $q->where('is_featured', 1);
                            }, 'courses.instructor'])->get();

        $instructorReviews = Review::with('from_user')->get();
        $featureContentLecture = ContentLecture::where('is_featured',1)->limit(4)->get();
        return view('student.pages.home_page' , compact('cateCoursesData','instructorReviews','featureContentLecture'));
    }

    /**
     * @param $categoryId
     * @return array
     */
    public function getFeatureCourses($categoryId){

        $featureCategoryType = 'all';
        if ($categoryId != 'all') {
            $featureCategoryType = 'single';
            $featureCourses = Categories::with(['courses' => function ($q){
                $q->where('is_featured', 1);
            },'courses.instructor'])->where('id', $categoryId)->first();
        }else {
            $featureCourses = Courses::with(['instructor','categories'])->where('is_featured', 1)->get();
        }

        return [
                'status' => true,
                'category_type' => $featureCategoryType,
                'data' =>  $featureCourses
            ];


    }

    /**
     * @param Request $request
     * @return array
     */
    public function getWeeklyNewsLetter(Request $request){

        $newsLetter = NewsLetter::where('email', $request->email)->first();
        if (is_null($newsLetter)) {
            $newsLetter = new NewsLetter();
            $newsLetter->email = $request->email;
            $newsLetter->save();
            return [
              'status'=> true,
              'message' => 'Now you can get weekly newsletter'
            ];
        }else {
            return [
                'status'=> false,
                'message' => 'Email already exists'
            ];
        }

    }
    /**
     * @param Request $request
     * @return array
     */
    public function getCategoryOptions(Request $request){

        $categories = Categories::where('parent_id', $request->id)->withCount('courses');
        return  [
            'status'=> true,
            'data' => $categories->get()
        ];
    }

    /**
     * @param Request $request
     */
    public function getCategoryCourses(Request $request)
    {
       $cateCourses =  Categories::with(['courses.instructor'])->where('id', $request->id)->first();
       return [
         'status' => true,
         'data' => $cateCourses
       ];
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listCourses(Request $request){

        $authors = Courses::select('teacher_name')->groupBy('teacher_name')->get();

        $featureContentLecture = ContentLecture::where('is_featured',0)->limit(4)->get();
        $courses = [];

        return view('student.pages.courses_page', compact('authors','featureContentLecture','courses'));
    }

    /**
     * @param Request $request
     * @return array
     */
    public function searchCourses(Request $request){

        $queryParams = $this->getParamsMultiQuery();

        $courses = Courses::with(["instructor","categories", "course_lectures","course_reviews" , "sub_categories"]);

        if (isset($queryParams['category']) && count($queryParams['category']) > 0) {

            $courses->whereHas('categories', function ($query) use ($queryParams) {
                // category filter
                $categories  = $queryParams['category'];
                $query->whereIn('name', $categories);
            })->orWhereHas('sub_categories', function ($query) use ($queryParams) {
                $categories = $queryParams['category'];
                $query->whereIn('name', $categories);
            });

        }

        if (isset($queryParams['author']) && count($queryParams['author']) > 0) {        // instructor filter
            $courses->whereHas('instructor', function ($q) use ($queryParams) {
                $author  = $queryParams['author'];
                $q->whereIn('teacher_name',$author);
            });
        }
        if (isset($queryParams['rating']) && count($queryParams['rating']) > 0) {

            $courses->whereHas('course_reviews', function ($q) use ($queryParams) {
                $rating  = $queryParams['rating'][0];
                $explodeRating = explode('-', $rating);
                $q->whereBetween('rating',[$explodeRating[0], $explodeRating[1]]);

            });
        }



        if (isset($queryParams['order_by']) && count($queryParams['order_by']) > 0) {

            $orderBy  = $queryParams['order_by'][0];
            if ($orderBy == 'latest') {
                $courses->orderBy('created_at', 'desc');
            }elseif ($orderBy == 'old') {
                $courses->orderBy('created_at', 'asc');
            }

        }else {
            $courses->orderBy('created_at', 'desc');
        }
        // search box hdr
        if (isset($queryParams['q_hdr']) && count($queryParams['q_hdr']) > 0) {

            $srchKeyword  = $queryParams['q_hdr'][0];
            $courses->where('name', 'like', '%' . $srchKeyword . '%');

        }

        // price filter
        if (isset($queryParams['price']) && count($queryParams['price']) > 0) {
            $priceParam  = $queryParams['price'];
            $price = 0;
            if ($priceParam[0] == 'free'){
                $price = 1;
            }
            $courses->where('is_free', $price);
        }
        // skill level filter
        if (isset($queryParams['skill_level']) && count($queryParams['skill_level']) > 0) {
            $skillLevelParam  = $queryParams['skill_level'];
            $courses->whereIn('course_skills', $skillLevelParam);
        }
        // search our box
        if (isset($queryParams['our_course']) && count($queryParams['our_course']) > 0) {
            $srchKeyword  = $queryParams['our_course'][0];
            $courses->where('name', 'like', '%' . $srchKeyword . '%');
        }
        $totalLectureContent = 0;
        $courses = $courses->paginate(10);
        foreach ($courses as $crs){
            $totalLectureContent +=  $crs->total_lecture_content;
        }
        return [
            'status' => true,
            'data' => [
                'total_courses' => count($courses),
                'total_lecture_content' => $totalLectureContent,
            ],
            'view' => view('student.pages.course_listing', compact('courses'))->render(),
        ];

    }

    /**
     * @return array
     */
    public function getParamsMultiQuery()
    {
        $query = $_SERVER['QUERY_STRING'];
        $vars = array();
        if (!empty($query)) {
            foreach (explode('&', $query) as $pair) {
                list($key, $value) = explode('=', $pair);

                if('' == trim($value)){
                    continue;
                }

                $vars[$key][] = urldecode($value);
            }

        }

        return $vars;
    }
}
