<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Mail;
class Email extends Model
{
    protected $table = 'emails';
    protected $fillable = ['name','subject','key','content'];
    protected $hidden = ['created_at','updated_at'];
	
	 public static function sendEmail($to ,$email_data, $body, $email_subject = ''){

        $res['results'] = $body;
        try {
            
            Mail::send([], $res, function ($message) use ($email_data, $to,$body, $email_subject) {

               $message->setBody($body, 'text/html' );
                if($email_subject != '')
                {
                    $subject = $email_subject;
                    $email_from = env('MAIL_FROM_ADDRESS');
                }
                else
                {
                    $subject = $email_data->subject;
                    $email_from = 'info@ilearning.com';
                }

                $message->from($email_from, $name = 'iLearning');
                $message->to($to, $to)->subject($subject);
            });
        }catch (Exception $e) {
            return $e->getMessage();
        }
    }
	
	
		 public static function sendEmailFrom($from ,$email_data, $body, $email_subject = ''){

        $res['results'] = $body;
        try {
            
            Mail::send([], $res, function ($message) use ($email_data, $from,$body, $email_subject) {

               $message->setBody($body, 'text/html' );
                if($email_subject != '')
                {
                    $subject = $email_subject;
                    $email_from = env('MAIL_FROM_ADDRESS');
                }
                else
                {
                    $subject = $email_data->subject;
                    $email_from = 'info@ilearning.com';
                }

                $message->from($from, $name = 'iLearning');
                $message->to($email_from, $email_from)->subject($subject);
            });
        }catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
