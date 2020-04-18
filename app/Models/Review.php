<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'reviews';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'from_id', 'to_id', 'reviews', 'created_at'
    ];
	/**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at'
    ];

	public function from_user() {
		return $this->belongsTo(User::class, 'from_id');
	}

    public function to_user() {
        return $this->belongsTo(User::class, 'to_id');
    }
}
