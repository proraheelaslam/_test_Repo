<?php


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
use App\Models\Categories;
use App\Models\Cities;
use App\Models\Slider;
use App\Models\Inbox;
use App\Models\Courses;
use App\Models\CourseQuestion;
use App\Models\ShoppingCart;
use App\Models\Students;
use App\Models\CourseBookmarks;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
if (!function_exists('getLanguageList')) {
    function getLanguageList() {
        return DB::table('languages')->pluck('name', 'key');
    }
}
if (!function_exists('getCategoryList')) {
    function getCategoryList() {
        $lang_key = session()->get('lang_key');
        $categories = Categories::where('parent_id', 0)->get();
        $categories->map(function ($row) use($lang_key){
            if($lang_key=='gr'){
                $row->name = $row->name_gr;
            }else if($lang_key=='ru'){
                $row->name = $row->name_ru;
            }
            else if($lang_key=='he'){
                $row->name = $row->name_he;
            }
            return $row;
        });
        return $categories;
    }
}

if (!function_exists('getCountryList')) {
    function getCountryList() {
        $lang_key = session()->get('site_locale');

        $country = \App\Models\Country::get();
        $country->map(function ($row) use($lang_key){
            if($lang_key=='gr'){
                $row->name = $row->name_gr;
            }else if($lang_key=='ru'){
                $row->name = $row->name_ru;
            }
            else if($lang_key=='he'){
                $row->name = $row->name_he;
            }
            return $row;
        });
        return $country;
    }
}

if (!function_exists('getMenuCategoryList')) {
    function getMenuCategoryList() {
        $lang_key = session()->get('site_locale');

        $category = \App\Models\MenuCat::get();
        $category->map(function ($row) use($lang_key){
            if($lang_key=='gr'){
                $row->name_en = $row->name_gr;
            }else if($lang_key=='ru'){
                $row->name_en = $row->name_ru;
            }
            else if($lang_key=='he'){
                $row->name_en = $row->name_he;
            }
            return $row;
        });
        return $category;
    }
}
if (!function_exists('getMenuLinks')) {
    function getMenuLinks($cat_key='') {
        $lang_key = session()->get('site_locale');

        $links = \App\Models\MenuLink::where('cat_key', $cat_key)->get();
        $links->map(function ($row) use($lang_key){
            if($lang_key=='gr'){
                $row->name_en = $row->name_gr;
            }else if($lang_key=='ru'){
                $row->name_en = $row->name_ru;
            }
            else if($lang_key=='he'){
                $row->name_en = $row->name_he;
            }
            return $row;
        });
        return $links;
    }
}



if (!function_exists('getCoursesList')) {
    function getCoursesList() {
        $lang_key = session()->get('lang_key');
        return Courses::get();
    }
}


if (!function_exists('getsubCategoryList')) {
    function getsubCategoryList($category_id=0, $limit=0) {
        $lang_key = session()->get('lang_key');
        if($limit==0){
            $sub_categories = Categories::where('parent_id', $category_id)->get();
        }else{
            $sub_categories = Categories::where('parent_id', $category_id)->offset(0)->limit($limit)->get();
        }
        if(!$sub_categories->isEmpty()){
            $sub_categories->map(function ($row) use($lang_key){
                if($lang_key=='gr'){
                    $row->name = $row->name_gr;
                }else if($lang_key=='ru'){
                    $row->name = $row->name_ru;
                }
                else if($lang_key=='he'){
                    $row->name = $row->name_he;
                }
                return $row;
            });
        }

        return $sub_categories;

    }
}

if (!function_exists('getCourseList')) {
    function getCourseList() {
        $lang_key = session()->get('lang_key');
        $course['beginner'] = Lang::get("label.Beginner");
        $course['intermediate'] = Lang::get("label.Intermediate");
        $course['advanced'] = Lang::get("label.Advanced");
        $course['appropriate_for_all'] = Lang::get("label.Appropriate for all");
        return $course;
    }
}

if (!function_exists('get_tooltip')) {
    function get_tooltip($text='')
    {
        return 'data-placement="top" data-toggle="tooltip" class="tooltips mr-20" type="button" data-original-title="'.$text.'"';
    }
}

if (!function_exists('getCityList')) {
    function getCityList() {
        $lang_key = session()->get('lang_key');
        return Cities::get();
    }
}
if (!function_exists('getSliderList')) {
    function getSliderList() {
        $lang_key = session()->get('lang_key');
        return Slider::get();
    }
}

if (! function_exists('checkAssetImage')) {

    function checkAssetImage($path)
    {
        if (file_exists(public_path('uploads/'.$path))){
            return asset('public/uploads/'.$path);
        }
        else
            return asset('public/uploads/no_image.png');
    }
}

if (!function_exists('isActiveRoute')) {
    function isActiveRoute($route, $output = "active") {

        if (Route::currentRouteName() == $route) {
            return $output;
        }

    }
}
if (!function_exists('areActiveRoutes')) {
    function areActiveRoutes(Array $routes, $output = "active") {
        foreach ($routes as $route) {
            if (Route::currentRouteName() == $route) {
                return $output;
            }

        }
    }
}
if (!function_exists('quickRandom')) {
    function quickRandom($length = 16) {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }
}
if (!function_exists('getDBSingleField')) {
    function getDBSingleField($table, $selected, $fieldname, $fieldvalue) {
        $data = DB::table($table)->select($selected)->where($fieldname, $fieldvalue)->first();
        if($data){
            $envStatus = $data->$selected;
            return $envStatus;
        }else{
            return '';
        }
    }
}
if (!function_exists('settingValue')) {
    function settingValue($key) {
        $setting = \DB::table('settings')->where('key', $key)->first();
        if ($setting) {
            return $setting->value;
        } else {
            return '';
        }

    }
}
if (!function_exists('setLang')) {
    function setLang() {
        $prefer_lang = Auth::user()->user_preferred_language;
        App::setLocale('en');
    }
}

if (!function_exists('set_date_formate')) {
    function set_date_formate($date) {
//return 1;
        return date('Y-m-d', strtotime($date));
    }
}

if (!function_exists('sendEmail')) {

    function sendEmail($email, $view_name) {

        //	print_r($view_name);

        try {

            Mail::send($view_name, $email, function ($message) use ($email) {

                $message->from($email['email_from_address'], $name = $email['email_from_name']);

                $message->to($email['email_to'], '')->subject($email['email_title']);

            });
        } catch (Exception $e) {

            return $e->getMessage();
        }

    }
}
if (!function_exists('image_resize')) {
    function image_resize($src, $dst, $width, $height, $crop = 0) {
        ini_set('memory_limit', '64M');
        if (!list($w, $h) = getimagesize($src)) {
            return "Unsupported picture type!";
        }

        $type = strtolower(substr(strrchr($src, "."), 1));
        if ($type == 'jpeg') {
            $type = 'jpg';
        }

        switch ($type) {
            case 'bmp':
                $img = imagecreatefromwbmp($src);
                break;

            case 'gif':
                $img = imagecreatefromgif($src);
                break;

            case 'jpg':
                $img = imagecreatefromjpeg($src);
                break;

            case 'png':
                $img = imagecreatefrompng($src);
                break;

            default:
                return "Unsupported picture type!";
        }

        // resize

        if ($crop) {
            if ($w < $width or $h < $height) {
                return "Picture is too small!";
            }

            $ratio = max($width / $w, $height / $h);
            $h = $height / $ratio;
            $x = ($w - $width / $ratio) / 2;
            $w = $width / $ratio;
        } else {
            if ($w < $width and $h < $height) {
                return "Picture is too small!";
            }

            $ratio = min($width / $w, $height / $h);
            $width = $w * $ratio;
            $height = $h * $ratio;
            $x = 0;
        }

        $new = imagecreatetruecolor($width, $height);

        // preserve transparency

        if ($type == "gif" or $type == "png") {
            imagecolortransparent($new, imagecolorallocatealpha($new, 0, 0, 0, 127));
            imagealphablending($new, false);
            imagesavealpha($new, true);
        }

        imagecopyresampled($new, $img, 0, 0, $x, 0, $width, $height, $w, $h);
        switch ($type) {
            case 'bmp':
                imagewbmp($new, $dst);
                break;

            case 'gif':
                imagegif($new, $dst);
                break;

            case 'jpg':
                imagejpeg($new, $dst);
                break;

            case 'png':
                imagepng($new, $dst);
                break;
        }

        return true;
    }


}
if (! function_exists('checkImage')) {

    function checkImage($path)
    {
        $paths = explode('/',$path);

        if (\File::exists(public_path('uploads/'.$path)) && count($paths)>1 && $paths[1]!=''){

            return asset('public/uploads/'.$path);
        }
        else{

            $path = explode('/',$path);
            $place_holder = 'user_placeholder.png';
            if(count($path) > 0){
                $path = $path[0];
            }
            return asset('public/uploads/'.$place_holder);
        }

    }
}

if (! function_exists('getUserDetail')) {

    function getUserDetail($id=0 , $key= 'name')
    {
        return Students::where('id', $id)->first()->$key;

    }
}

if (! function_exists('getLatestMessage')) {

    function getLatestMessage($id)
    {
        $messages = Inbox::with('from_user')->where('to_id', $id)->where('is_read', 0)->offset(0)->limit(3)->get();
        return $messages;
    }
}

if (! function_exists('getStudentPercentage')) {

    function getStudentPercentage($numberOfStudent, $total)
    {
        $studentPercent = 0;

        if($numberOfStudent != ""  && $total !=  "") {
            $studentPercent =  round($numberOfStudent / $total *100 , 0);
        }

        return $studentPercent;
    }
}
if (! function_exists('getPopularCategories')) {

    function getPopularCategories($category_id=0, $limit=0)
    {
        $lang_key = session()->get('lang_key');
        if($limit==0){
            return Categories::where('parent_id', $category_id)->where('is_popular',1)->get();
        }else{
            return Categories::where('parent_id', $category_id)->where('is_popular',1)->offset(0)->limit($limit)->get();
        }
    }
}

if (! function_exists('getAllQuestion')) {

    function getAllQuestion($course_id)
    {
        return CourseQuestion::where('course_id', $course_id)-> get();
    }
}

if (! function_exists('getAllShoppingCartItems')) {

    function getAllShoppingCartItems()
    {
        $user_id = Auth::guard('student')->id();
        return ShoppingCart::with('course_details')
            ->where('order_id', 0)
            ->where(function($query) use($user_id){
                return $query->where('student_id', $user_id)
                    ->orWhere('ip', getUniqueSessionId() );

            })->get();
    }
}


if (! function_exists('getTotalCartItems')) {

    function getTotalCartItems()
    {
        $user_id = Auth::guard('student')->id();
        return ShoppingCart::where('order_id', 0)
            ->where(function($query) use($user_id){
                return $query->where('student_id', $user_id)
                    ->orWhere('ip', getUniqueSessionId() );

            })->count();
    }
}


if (! function_exists('getShoppingCartItemById')) {

    function getShoppingCartItemById($id)
    {
        $user_id = Auth::guard('student')->id();
        return ShoppingCart::where('order_id', 0)
            ->where('course_id', $id)
            ->where(function($query) use($user_id){
                return $query->where('student_id', $user_id)
                    ->orWhere('ip', getUniqueSessionId() );

            })->first();

    }
}

if (! function_exists('getSubTotalItemsPrice')) {

    function getSubTotalItemsPrice()
    {
        $user_id = Auth::guard('student')->id();
        return ShoppingCart::where('order_id', 0)
            ->where(function($query) use($user_id){
                return $query->where('student_id', $user_id)
                    ->orWhere('ip', getUniqueSessionId() );

            })->sum('price');
    }
}

if (! function_exists('getTotalEnrolledStudent')) {

    function getTotalEnrolledStudent()
    {
        return Students::where('is_instructor', 0)->count();
    }
}
if (! function_exists('getTotalCertifiedTeachers')) {

    function getTotalCertifiedTeachers()
    {
        return Students::where('is_instructor', 1)->count();
    }
}
if (! function_exists('getTotalCourses')) {

    function getTotalCourses()
    {
        return Courses::count();
    }
}

if (! function_exists('isCourseBookMarked')) {

    function isCourseBookMarked($course_id=0)
    {
        $user_id = @Auth::guard('student')->user()->id;
        $ip = session()->getId();
        $bookmarked = CourseBookmarks::where('course_id', $course_id)
            ->where(function($query) use($user_id,$ip){
                return $query->where('user_id', $user_id)
                    ->orWhere('ip',$ip );
            })->first();
        if($bookmarked){
            return true;
        }else{
            return false;
        }
    }
}


if (! function_exists('getUniqueSessionId')) {

    function getUniqueSessionId()
    {

        $sessionId = session_id();
        return $sessionId;
    }
}

if (! function_exists('getOrderStatus')) {

    function getOrderStatus()
    {
        $array['Pending'] = 'Pending';
        $array['Completed'] = 'Completed';
        $array['Cancelled'] = 'Cancelled';
        return $array;
    }
}

if (! function_exists('getUnreadNotification')) {

    function getUnreadNotification($limit=0)
    {
        if($limit!=0){
            $notifications =  \App\Models\Notification::where('to_id', Auth::user()->id)->where('is_read', '!=', 1)->orderby('id','desc')->limit(3)->get();
        }else{
            $notifications =  \App\Models\Notification::where('to_id', Auth::user()->id)->where('is_read', '!=', 1)->orderby('id','desc')->get();
        }
        return $notifications;
    }
}
?>
