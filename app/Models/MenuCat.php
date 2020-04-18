<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuCat extends Model {
	protected $table = 'menu_category';

	protected $fillable = ['name_en','name_ru','name_he','name_gr','cat_key'];

	protected $hidden = ['created_at', 'updated_at'];

}
