<?php

namespace App\Models;

use App\Admin;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = ['question','answer','user_id','type_id', 'greek_question', 'russian_question', 'hebrew_question', 'greek_answer',
        'russian_answer', 'hebrew_answer'];

    protected $hidden = ['created_at', 'updated_at'];

    public function author()
    {
        return $this->belongsTo(Admin::class,'user_id');
    }
    public function type()
    {
        return $this->hasMany(FaqType::class,'type_id');
    }
}
