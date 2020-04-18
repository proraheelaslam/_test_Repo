<?php

namespace App\Models;
use File;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model {
	//
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	 protected $table = 'subscription_plans';
	   protected $primaryKey = 'id';
	protected $fillable = [
		'name', 'duration','fee','detail'
	];
	protected $hidden = ['created_at', 'updated_at'];

	
}
