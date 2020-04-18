<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model {
	//
	protected $table = 'shopping_carts';

	protected $fillable = ['student_id', 'course_id',  'quantity', 'price','tax','order_id', 'ip'];

	protected $hidden = ['created_at', 'updated_at'];
	protected $appends = ['total_price'];

	public function course_details() {

		return $this->belongsTo(Courses::class, 'course_id');
	}

    public function student_details() {
		return $this->belongsTo(Students::class, 'student_id');
	}

    public function order_details() {
        return $this->belongsTo(Orders::class, 'order_id');
    }

    public function getTotalPriceAttribute(){
	    return $this->attributes['quantity']*$this->attributes['price'];
    }


}
