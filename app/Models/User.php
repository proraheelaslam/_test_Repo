<?php

namespace App\Models;
use File;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
class User extends Authenticatable
{
   use HasApiTokens,  Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','is_active','first_name','last_name','is_business','about_me','latitude','longitude','address','country','city','state','zip_code','lang_key','image','phone_number','facebook_id','google_id'
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
	
	

    protected $appends = array('fullImage','thumbImage');
    public function subscriptions()
    {
        return $this->belongsTo(SubscriptionPlan::class, 'user_id');
    }
    public function getfullImageAttribute()

    {
            $image_name = 'no_image.png';

            if($this->attributes['image']){

                $image_name = $this->attributes['image'];

            }
            return public_path("/uploads/users/".$image_name);

    }

   

    public function getthumbImageAttribute()

    {

            $image_name = 'no_image.png';

            if($this->attributes['image']){

                $image_name = $this->attributes['image'];

            }
            return public_path("/uploads/users/thumb/".$image_name);
    }

    /**

     * hasMany business

     */
    public function business()
    {
        return $this->belongsTo(Business::class);
    }
	
	
	protected static function boot() {
		parent::boot();

		static::deleting(function ($categories) {

			//remove image
		//	$destinationPath = 'upload/category/';
		//	File::delete($destinationPath . $categories->image);
			//$destinationThumbneilPath = 'upload/category/thumbs/';
			//File::delete($destinationThumbneilPath . $categories->image);

		});
	}
}
