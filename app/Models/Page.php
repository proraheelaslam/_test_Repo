<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model {
	protected $table = 'content_pages';

	protected $fillable = ['name','name_ru','name_he','name_gr', 'content','content_ru','content_he','content_gr', 'meta_title','meta_title_ru','meta_title_he','meta_title_gr','meta_description','meta_description_ru','meta_keywords','meta_keywords_ru','meta_keywords_he','meta_keywords_gr','meta_description_he','meta_description_gr','key','lang_key'];

	protected $hidden = ['created_at', 'updated_at'];

}
