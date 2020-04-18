<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class StudentBillingDetail extends Model
{
    protected $table = 'student_billing_detail';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id', 'first_name', 'last_name','company_name','country_id','street_address',
        'street_address_2', 'post_code','city','province','phone',
        'email','order_notes','order_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];


    protected $appends = array('fullName');


    public function getFullNameAttribute(){
        return $this->attributes['first_name']. ' '. $this->attributes['last_name'];
    }


    public function country(){

        return $this->BelongsTo(Country::class,'country_id');
    }


	protected static function boot() {
		parent::boot();

		static::deleting(function ($schools) {

		});
	}
}
