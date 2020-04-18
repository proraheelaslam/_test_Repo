<?php

namespace App\Models;
use File;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
class Students extends Authenticatable
{
   use HasApiTokens,  Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','is_active','address','dob','age',
        'phone','about_student','registration_number','registartion_date',
        'image','first_name','last_name','father_full_name','gender',
        'random_student_id','roll_number','school_id','class_id','grade_id',
        'is_instructor', 'is_online','facebook', 'twitter', 'linkedin', 'instagram', 'facebook_id', 'google_id'
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



    protected $appends = array('fullImage','thumbImage','fullName','total_instructor_review','overall_instructor_rating');


    public function getFullNameAttribute(){
        
        if (!is_null($this->attributes['first_name']) && !is_null($this->attributes['last_name'])) {
            return $this->attributes['first_name']. ' '. $this->attributes['last_name'];
        }else {
            return $this->attributes['name'];
        }

    }


    public function getfullImageAttribute()

    {
        $image_name = 'no_image.png';

        if($this->attributes['image']){

            $image_name = $this->attributes['image'];
            return checkAssetImage("students/".$image_name);

        }else{
            return asset('public/uploads/no_image.png');
        }


    }

    public function getthumbImageAttribute()

    {

            $image_name = 'no_image.png';
            if($this->attributes['image']){

                $image_name = $this->attributes['image'];
                return checkAssetImage("students/thumb/".$image_name);

            }else{
                return asset('public/uploads/no_image.png');
            }
    }

    public function instructor_courses(){

        return $this->hasMany(Courses::class,'student_id');
    }

    public function instructorReviews(){

        return $this->hasMany(Review::class,'from_id');
    }
    public function getTotalInstructorReviewAttribute(){

        return $this->hasMany(CourseReview::class,'instructor_id')->count();
    }

    public function getOverAllInstructorRatingAttribute(){

        $rating =  $this->hasMany(CourseReview::class,'instructor_id')->avg('rating');
        return number_format((float)$rating, 2, '.', '');
    }
    public function instructor_reviews(){

        return $this->hasMany(CourseReview::class,'instructor_id');
    }
	protected static function boot() {
		parent::boot();

		static::deleting(function ($schools) {

			//remove image
			$destinationPath = 'public/uploads/students/';
			File::delete($destinationPath . $schools->image);
			$destinationThumbneilPath = 'public/uploads/students/thumbs/';
			File::delete($destinationThumbneilPath . $schools->image);

		});
	}
}
