<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class MailSend extends Controller
{
    public function mailsend()
    {
        $details = [
            'title' => 'Title: Mail from Sudhanshu(SAM) Programmer',
            'body' => 'Body: This is for testing email using smtp'
        ];

        Mail::to('siddharthmittalgupta01@gmail.com')->send(new SendMail($details));
        // \Mail::to('siddharthmittalgupta01@gmail.com')->send(new \App\Mail\MyTestMail($details));
        return view('emails.thanks');
    }
}

//Mailable