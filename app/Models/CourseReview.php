<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CourseReview extends Model
{
    //
    protected $table = 'course_reviews';

    protected $fillable = [
         'title','content', 'course_id','student_id','rating','review_time' , 'instructor_id'
    ];

    public function course_review_student(){

        return $this->belongsTo(Students::class,'student_id');
    }

    public function getReviewTimeAttribute(){
        return  Carbon::parse($this->attributes['review_time'])->diffForHumans();
    }

}
