<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Mail;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function sendEmail($email)
    {
      try {
            $email['email_footer'] = isset($email['email_footer']) ? $email['email_footer'] : settingValue('footer_text');
            $status = Mail::send('mail.mail_body',$email, function ($message) use ($email) {


                if(isset($email['from_user']) && isset($email['from_name'])){
                
                    $message->from($email['from_user'], $name = $email['from_name']);

                }else{

                    $message->from(settingValue('email_from'), $name = settingValue('email_from_name'));
                }

                $message->to($email['email_to'], $email['email_to'])->subject($email['email_subject']);
    
            });
         
        }catch (Exception $e) {
            echo $e->getMessage();die();
        }
    }
}
