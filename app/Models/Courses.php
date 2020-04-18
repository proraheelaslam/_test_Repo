<?php

namespace App\Models;
use File;
use Illuminate\Database\Eloquent\Model;
use Hashids;
class Courses extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id', 'name', 'short_desc', 'course_key','category_id','sub_category_id',
        'school_id','grade_id','class_id','course_code','course_includes',
        'course_requirement','description','image','course_price', 'course_start', 'course_expire',
        'teacher_name', 'is_free', 'course_skills', 'course_tags', 'is_live_stream', 'streaming_date', 'start_streaming_time',
        'end_streaming_time'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'fullImage' , 'thumbImage',
        'courseCreated', 'coursePrice',
        'total_lecture_time','course_rating',
        'total_lecture_content',
        'hash_encoded_id',
        'total_review_students',
        'five_star_rating_students',
        'four_star_rating_students',
        'three_star_rating_students',
        'two_star_rating_students',
        'one_star_rating_students',
        'course_tags_arr',
        'total_participants'
    ];
    public function getFullImageAttribute()

    {
        $image_name = 'coures_place_holder.png';
        if($this->attributes['image']){

            $image_name = $this->attributes['image'];
            return checkAssetImage('courses/'.$image_name);
        }else{
            return asset('public/uploads/coures_place_holder.png');
        }
    }


    public function getThumbImageAttribute()

    {

        $image_name = 'coures_place_holder.png';
        if($this->attributes['image']){

            $image_name = $this->attributes['image'];
            return checkAssetImage('courses/thumbs/'.$image_name);
        }else{
            return asset('public/uploads/coures_place_holder.png');
        }

    }
    public function categories(){

        return $this->belongsTo(Categories::class, 'category_id');
    }
    public function course_participants() {
		return $this->hasMany(UserCourse::class, 'course_id', 'id');
	}

	public function getTotalParticipantsAttribute(){

        return $this->hasMany(UserCourse::class, 'course_id', 'id')->count();
    }

    public function instructor_detail() {
        return $this->belongsTo(Students::class, 'student_id', 'id');
    }
    public function course_lectures() {
        return $this->hasMany(ContentLecture::class, 'course_id', 'id');
    }
    public function course_features() {
        return $this->hasMany(CourseFeature::class, 'course_id', 'id');
    }
    public function course_reviews() {
        return $this->hasMany(CourseReview::class, 'course_id', 'id');
    }
    public function instructor(){

        return $this->belongsTo(Students::class, 'student_id');
    }
    public function getTotalLectureTimeAttribute(){

        $fileTime = $this->hasMany(ContentLecture::class, 'course_id')->sum('file_time');

        //$post_duration = $fileTime/10000;
        $post_duration = $fileTime;
        $timehours = $post_duration/3600;
        $timeminutes =($post_duration % 3600)/60;
        $timeseconds = ($post_duration % 3600) % 60;
        $timehours = explode(".", $timehours);
        $timeminutes = explode(".", $timeminutes);
        $timeseconds = explode(".", $timeseconds);
        $duration = $timehours[0]. ":" . $timeminutes[0]. ":" . $timeseconds[0];
        return $duration;

        return gmdate("H:i:s", $fileTime);
    }
    public function getHashEncodedIdAttribute(){

        return Hashids::encode($this->attributes['id']);
    }
    public function getTotalLectureContentAttribute(){

        return $this->hasMany(ContentLecture::class, 'course_id')->count();
    }
    public function getCourseRatingAttribute(){

        $rating =  $this->hasMany(CourseReview::class, 'course_id')->avg('rating');
        return number_format((float)($rating), 2, '.', '');
    }
    public function getCourseCreatedAttribute() {
        return date('M d, Y', strtotime($this->attributes['created_at']));
    }
    public function getCoursePriceAttribute() {
        return number_format($this->attributes['course_price'], 2);
    }
    public function course_contents()
    {
        return $this->hasMany(CoursesContent::class, 'course_id');
    }
    public function getTotalReviewStudentsAttribute(){

        return $this->hasMany(CourseReview::class,'course_id')->count();
    }
    public function featured_videos(){
        return $this->hasMany(ContentLecture::class, 'course_id')->where('is_featured',1);
    }
    public function getFiveStarRatingStudentsAttribute()
    {
        $singleReview =  $this->hasMany(CourseReview::class, 'course_id')
            ->where('rating','<=',5)
            ->where('rating','>=',4.5)
            ->count();
        return $singleReview;
    }
    public function getFourStarRatingStudentsAttribute()
    {

        $singleReview =  $this->hasMany(CourseReview::class, 'course_id')
            ->where('rating','<=',4)
            ->where('rating','>=',3.5)
            ->count();
        return $singleReview;
    }
    public function getThreeStarRatingStudentsAttribute()
    {

        $singleReview = $this->hasMany(CourseReview::class, 'course_id')
            ->where('rating','<=',3)
            ->where('rating','>=',2.5)
            ->count();
        return $singleReview;
    }
    public function getTwoStarRatingStudentsAttribute()
    {

        $singleReview =  $this->hasMany(CourseReview::class, 'course_id')
            ->where('rating','<=',2)
            ->where('rating','>=',1.5)
            ->count();
        return $singleReview;
    }
    public function getOneStarRatingStudentsAttribute()
    {

        $singleReview =  $this->hasMany(CourseReview::class, 'course_id')
            ->where('rating','<=',1.5)

            ->count();
        return $singleReview;
    }

    public  function getCourseTagsArrAttribute(){
        $course_tag = $this->attributes['course_tags'];
        if($course_tag!=null){
            $course_tag = explode(', ', $course_tag);
        }
        return $course_tag;
    }

    public  function getCourseOrderStatusAttribute(){
        $course_id = $this->attributes['course_id'];
        $status = 'Pending';
        $shopping_cart = ShoppingCart::with('order_details')
           ->where('course_id', $course_id)
           ->where('student_id',@Auth::guard('student')->user()->id)
           ->first();
        if($shopping_cart->order_details){
            $status = $shopping_cart->order_details->order_status;
        }

        return $status;
    }


    public function sub_categories(){

        return $this->belongsTo(Categories::class, 'sub_category_id');
    }
    /*public function getAverageRatingAttribute(){

        $course_reviews = CourseReview::where('course_id', $this->attributes['id'])->get();
        $total_reviews = count($course_reviews);
        $sum_reviews = 0;

        foreach ($course_reviews as $row){
            $sum_reviews = $sum_reviews+$row->rating;
        }
        if($sum_reviews!=0){
            $sum_reviews = $sum_reviews/$total_reviews;
        }
        return round($sum_reviews);

    }*/

    /**
     * boot
     */
    protected static function boot ()
    {
        parent::boot();

        static::deleting(function($course) {
            $course->course_lectures()->delete();
            $course->course_features()->delete();
            $course->course_reviews()->delete();
        });
    }
}
