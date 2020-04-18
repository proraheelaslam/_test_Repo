<?php

namespace App\Models;
use File;
use App\Traits\Geographical;
use Illuminate\Database\Eloquent\Model;

class Business extends Model {
	
	use Geographical;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	 
	 protected $table = 'business';
	 protected static $kilometers = true;
	 protected $fillable = [
		'name', 'email','detail','user_id','website','logo','category_id','sub_category_id','address','city','state','zip_code','phone_number','country','about_business','service','is_approve','business_key','latitude','longitude','logo','image','payment_status'];

   public function business_images() {
		return $this->hasMany(BusinessImages::class, 'business_id', 'id');
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
	public function city_details() {
		return $this->belongsTo(Cities::class, 'city','id');
	}
	
	public function state_details() {
		return $this->belongsTo(State::class, 'state','id');
	}
	
	public function country_details() {
		return $this->belongsTo(Country::class, 'country','id');
	}
	
	protected static function boot() {
		parent::boot();

		static::deleting(function ($business) {

			//remove image
		//	$destinationPath = 'upload/category/';
		//	File::delete($destinationPath . $categories->image);
			//$destinationThumbneilPath = 'upload/category/thumbs/';
			//File::delete($destinationThumbneilPath . $categories->image);

		});
	}

}
