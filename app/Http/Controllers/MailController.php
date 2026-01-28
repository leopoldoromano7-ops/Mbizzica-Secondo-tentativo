<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function news()
    {
        return view('home');
    }



    public function send_email(Request $request)
    {
        $username = $request->input("username");
        $email = $request->email;

        Mail::to($email)->send(new ContactMail($username, $email));

        return redirect()->back()->with('message', 'Mail Inviata con successo!');
    }
}
