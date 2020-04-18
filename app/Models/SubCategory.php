<?php

namespace App\Models;
use File;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model {
	//
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'parent_id', 'name_ru','name', 'category_key','name_iw','name_el','image'
	];
	
	protected $appends = array('fullImage','thumbImage');
	protected $primaryKey = 'id';
  
     public function getfullImageAttribute()

    {
            $image_name = 'no_image.png';

            if($this->attributes['image']){

                $image_name = $this->attributes['image'];

            }
            return public_path("/uploads/category/".$image_name);

    }

   

    public function getthumbImageAttribute()

    {

            $image_name = 'no_image.png';

            if($this->attributes['image']){

                $image_name = $this->attributes['image'];

            }
            return public_path("/uploads/category/thumb/".$image_name);
    }
	public function order_total() {
		return $this->category_orders()->sum('order_total');
	}
	public function category_orders() {
		return $this->hasMany(Orders::class, 'category_id', 'id');
	}

	public function order_details() {
		return $this->belongsTo(Orders::class, 'id');
	}
	protected static function boot() {
		parent::boot();

		static::deleting(function ($categories) {

			//remove image
			$destinationPath = 'public/uploads/category/';
			File::delete($destinationPath . $categories->image);
			$destinationThumbneilPath = 'public/uploads/category/thumbs/';
			File::delete($destinationThumbneilPath . $categories->image);

		});
	}

}
