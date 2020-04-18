<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model {

	protected $table = 'notifications';

	protected $fillable = ['to_id', 'course_id', 'subject', 'notification','is_read'];

	protected $hidden = ['created_at', 'updated_at'];

    protected $primaryKey = 'id';

	public function user_details() {

		return $this->belongsTo(User::class, 'to_id');

	}
}
