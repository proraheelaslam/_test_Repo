<?php

namespace App\Models;
use File;
use Illuminate\Database\Eloquent\Model;
class CourseBookmarks extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	  protected $table = 'course_bookmarks';
    protected $fillable = [
        'course_id', 'user_id', 'ip'
    ];


	public function user_details() {
		return $this->belongsTo(Students::class, 'user_id');
	}
	public function course_details() {
		return $this->belongsTo(Courses::class, 'course_id');
	}


}
