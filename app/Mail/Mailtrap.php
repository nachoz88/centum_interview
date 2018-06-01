<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class Mailtrap extends Mailable
{
    use Queueable, SerializesModels;
    public function _construct()
    {
        
    }
    public function build()
    {
        return $this->view('emails.send');
    }
}