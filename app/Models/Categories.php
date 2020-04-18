<?php

namespace App\Models;
use File;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model {
	//
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'parent_id', 'name_ru','name', 'category_key','name_he','name_gr','image'
	];
	protected $appends = array('fullImage','thumbImage');
	protected $primaryKey = 'id';


    public function getfullImageAttribute(){

        $image_name = 'category_place_holder.png';
        if($this->attributes['image']){
            $image_name = $this->attributes['image'];
            return asset("public/uploads/category/".$image_name);
        }else {
            return asset("public/uploads/".$image_name);
        }

    }

    public function getthumbImageAttribute(){

        $image_name = 'category_place_holder.png';
        if($this->attributes['image']){
            $image_name = $this->attributes['image'];
            return public_path("/uploads/category/thumb/".$image_name);
        }else {
            return public_path("/uploads/".$image_name);
        }

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

	public function courses()
    {
        return $this->hasMany(Courses::class, 'category_id');
	}

	public function subcat_courses()
    {
        return $this->hasMany(Courses::class, 'sub_category_id');
	}

	public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function childs()
    {
        return $this->hasMany(self::class, 'parent_id');
	}

	protected static function boot() {
		parent::boot();
		static::deleting(function ($categories) {
			$destinationPath = 'public/uploads/category/';
			$destinationThumbneilPath = 'public/uploads/category/thumbs/';
			foreach ($categories->childs as $child) {
				File::delete($destinationPath . $child->image);
				File::delete($destinationThumbneilPath . $child->image);
				$child->delete();
			}
			//remove image
			File::delete($destinationPath . $categories->image);
			File::delete($destinationThumbneilPath . $categories->image);
		});
	}

}
