<?php

namespace App\Helpers;
use App\Http\Responses\Api;
use App\Mail\GeneralMail;
use App\Jobs\SendMailJob;
use Auth,DB;
use Illuminate\Support\Facades\Request;


class MailHelper
{
    /**
     * Send mail salary
     * 
     * @param Transaction $transaction
     */
    public static function sendMail($data)
    {
        //Send mail
        $dataMail['email']   = $data['email'];
        $dataMail['name']    = $data['full_name'];
        $dataMail['subject'] = 'Xác nhận lịch đăng ký hiến máu';
        $mailJob = new GeneralMail();
        $mailJob->setFromDefault()
                ->setView('emails.register_event_email', $data)
                ->setSubject($dataMail['subject'])
                ->setTo($dataMail['email']);
        dispatch(new SendMailJob($mailJob));
    }
}
