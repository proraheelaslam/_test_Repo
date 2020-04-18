<?php

namespace App\Models;
use File;
use Illuminate\Database\Eloquent\Model;
class CoursesContent extends Model
{
  

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	  protected $table = 'course_content';
    protected $fillable = [
        'name', 'content_title','content_desc', 'course_id'
    ];

  
	
	
}
