<?php

namespace App\Models;
use Carbon\Carbon;
use File;
use Illuminate\Database\Eloquent\Model;

class Inbox extends Model {
	//
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'inbox';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'inbox_thread_id', 'from_id','to_id', 'message','is_send', 'created_at'
	];
    protected $hidden = [
        'updated_at'
    ];
    protected $appends = [
        'message_time'
    ];
	protected $primaryKey = 'id';


	public function from_user() {
		return $this->belongsTo(Students::class,'from_id', 'id');
	}

	public function to_user() {
        return $this->belongsTo(Students::class,'to_id', 'id');
	}

    public function inbox_thread() {
        return $this->belongsTo(InboxThread::class,'inbox_thread_id', 'id');
    }

    public function getMessageTimeAttribute(){
	    /*$time = '';
	    if(date('Y-m-d', strtotime($this->attributes['created_at'])) == date('Y-m-d')){
	        $time = 'Today,';
        }else if(date('Y-m-d', strtotime($this->attributes['created_at']))==  date('d.m.Y',strtotime("-1 days"))){
            $time = 'Yesterday,';
        }else{
	        $time = date('Y-m-d');
        }

	    $time.= ' '.date('h:i A', strtotime($this->attributes['created_at']));
	    return $time;*/
	    return Carbon::parse($this->attributes['created_at'])->diffForHumans();
    }

	protected static function boot() {
		parent::boot();
	}

}
