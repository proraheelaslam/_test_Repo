<?php

namespace App\Models;
use File;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model {
	//
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'name_ru','name', 'class_key','name_iw','name_el','class_code'
	];
	
  protected $primaryKey = 'id';
  
 

}
