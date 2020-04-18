<?php

namespace App\Models;
use File;
use Illuminate\Database\Eloquent\Model;
class UserViews extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	  protected $table = 'user_views';
        protected $fillable = [
             'to_id'
        ];
        protected $hidden = ['created_at', 'updated_at'];


	public function to_user_details() {
		return $this->belongsTo(Students::class, 'to_id');
	}


}
