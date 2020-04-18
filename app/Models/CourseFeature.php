<?php

namespace App\Models;
use File;
use Illuminate\Database\Eloquent\Model;
class CourseFeature extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	  protected $table = 'course_features';
    protected $fillable = [
        'course_id', 'feature_key','feature_value'
    ];




}
