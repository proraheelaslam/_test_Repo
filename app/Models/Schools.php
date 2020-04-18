<?php

namespace App\Models;
use File;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
class Schools extends Authenticatable
{
   use HasApiTokens,  Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','is_active','address','website','year_since','phone','description','mission_statment','lang_key','image',
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
  
    public function getfullImageAttribute()

    {
            $image_name = 'no_image.png';

            if($this->attributes['image']){

                $image_name = $this->attributes['image'];

            }
            return public_path("/uploads/schools/".$image_name);

    }

   

    public function getthumbImageAttribute()

    {

            $image_name = 'no_image.png';

            if($this->attributes['image']){

                $image_name = $this->attributes['image'];

            }
            return public_path("/uploads/schools/thumb/".$image_name);
    }

	
	protected static function boot() {
		parent::boot();

		static::deleting(function ($schools) {

			//remove image
			$destinationPath = 'public/uploads/schools/';
			File::delete($destinationPath . $schools->image);
			$destinationThumbneilPath = 'public/uploads/schools/thumbs/';
			File::delete($destinationThumbneilPath . $schools->image);

		});
	}
}
