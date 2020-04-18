<?php

namespace App\Models;
use File;
use Illuminate\Database\Eloquent\Model;

class Grades extends Model {
	//
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'name_ru','name', 'grade_key','name_iw','name_el'
	];
	
  protected $primaryKey = 'id';
  
 

}
