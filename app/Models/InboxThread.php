<?php

namespace App\Models;
use File;
use Illuminate\Database\Eloquent\Model;
use Auth;

class InboxThread extends Model {
	//
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'inbox_thread';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'from_id','to_id'
	];
    protected $hidden = [
        'created_at', 'updated_at'
    ];
    protected $appends = [
        'count_unread_messages'
    ];
	protected $primaryKey = 'id';

    public function getCountUnreadMessagesAttribute()
    {
        return Inbox::where('inbox_thread_id', $this->attributes['id'])->where('to_id', Auth::user()->id)->where('is_read', 0)->count();
    }
	public function from_user() {
		return $this->belongsTo(Students::class,'from_id', 'id');
	}

	public function to_user() {
        return $this->belongsTo(Students::class,'to_id', 'id');
	}

    public function messages() {
        return $this->hasMany(Inbox::class,'inbox_thread_id', 'id');
    }

    public function last_message(){
	    return $this->hasMany(Inbox::class, 'inbox_thread_id', 'id')
            ->where('to_id', Auth::user()->id)
            ->orderby('id', 'desc')
            ->limit(1);
    }

	protected static function boot() {
		parent::boot();
	}

}
