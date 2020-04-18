<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model {
	//
	protected $table = 'orders';

	protected $fillable = ['course_id', 'school_id', 'student_id', 'order_total','order_status','order_date', 'payment_method', 'order_note'];

    protected $appends = ['payment_method_detail'];


    public function getPaymentMethodDetailAttribute(){
        if($this->attributes['payment_method']==1){
            return 'Direct bank transfer';
        }else if($this->attributes['payment_method']==2){
            return 'Check payments';
        }else{
            return 'Paypal';
        }
    }
	public function course_details() {

		return $this->belongsTo(Courses::class, 'course_id');
	}

	public function school_details() {
		return $this->belongsTo(Schools::class, 'school_id');
	}

    public function student_details() {
		return $this->belongsTo(Students::class, 'student_id');
	}

    public function shopping_carts() {
        return $this->hasMany(ShoppingCart::class, 'order_id');
    }
    public function billing_detail() {
        return $this->belongsTo(StudentBillingDetail::class, 'id', 'order_id');
    }
}
