<?php

namespace App\Models;
use File;
use Illuminate\Database\Eloquent\Model;
class CourseQuestion extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $table = 'course_question';
    protected $fillable = [
        'course_id', 'student_id','question','answer'
    ];
    protected $hidden = ['created_at', 'updated_at'];

    public function student_detail(){

        return $this->belongsTo(Students::class, 'student_id');
    }
    public function course_detail(){

        return $this->belongsTo(Courses::class, 'course_id');
    }

}
