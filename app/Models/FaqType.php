<?php

namespace App\Models;

use App\Admin;
use Illuminate\Database\Eloquent\Model;

class FaqType extends Model
{
    protected $fillable = ['type_en','type_gr','type_ru','type_he'];

    protected $hidden = ['created_at', 'updated_at'];

    public function faqs()
    {
        return $this->hasMany(Faq::class,'type_id');
    }
}
