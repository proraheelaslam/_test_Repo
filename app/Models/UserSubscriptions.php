<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSubscriptions extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_subscriptions';

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
        'business_id','user_id','paypal_profile_id', 'subscription_id', 'expired_at'
    ];
	/**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    /**

     * belongs to subscriptions

     */
    public function subscriptions()
    {
        return $this->belongsTo(SubscriptionPlan::class, 'subscription_id');
    }
}
