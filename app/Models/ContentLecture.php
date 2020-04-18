<?php

namespace App\Models;
use File;
use Illuminate\Database\Eloquent\Model;
class ContentLecture extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	  protected $table = 'course_content_lectures';
    protected $fillable = [
        'file_type', 'title','course_content_id','short_desc', 'course_id','file_name', 'image_cover', 'is_featured','file_time'
    ];

    protected $appends = ['full_file_path', 'full_image', 'lecture_time'];

    public function getFullFilePathAttribute(){

        $file_name = 'no_image.png';
        if($this->attributes['file_name']){

            $file_name = $this->attributes['file_name'];
        }
        return asset("public/uploads/lecture/".$file_name);
    }

    public function getFullImageAttribute(){

        $file_name = 'no_image.png';
        if($this->attributes['image_cover']){

            $file_name = $this->attributes['image_cover'];
        }
        return asset("public/uploads/lecture_cover/".$file_name);
    }
    public function getLectureTimeAttribute(){
        $fileTime = $this->attributes['file_time'];

       // $post_duration = $fileTime/10000;
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


}
