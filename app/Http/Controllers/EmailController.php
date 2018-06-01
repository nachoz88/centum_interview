<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Mailtrap;

use App\Http\Requests;

class EmailController extends Controller
{
    public function send()
    {
        // $title = $request->input('title');
        // $content = $request->input('content');

        // Mail::send('emails.send', ['title' => $title, 'content' => $content], function ($message)
        // {

        //     $message->from('nkanyagia1@gmail.com', 'Nicholas Kanyagia');

        //     $message->to('nkk77707@gmail.com');

        // });

        // return response()->json(['message' => 'Request completed']);
        Mail::to('nkk77707@gmail.com')->send(new Mailtrap());
    }
}
