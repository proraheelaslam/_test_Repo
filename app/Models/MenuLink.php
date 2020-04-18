<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuLink extends Model {
	protected $table = 'menu_links';

	protected $fillable = ['cat_key','name_en','name_ru','name_he', 'name_gr','link'];

	protected $hidden = ['created_at', 'updated_at'];

}
