<?php

namespace App\Http\Controllers;

use App\Mail\BootcampMail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FormBootcamp extends Controller
{ 
    public function index()
    {
        return view('welcome');
    }

    public function sendMail(Request $request)
    {   
        $request->validate([
            'recipient' => 'email',
            'subject' => 'required',            
            'comment' => 'required',
        ]);

        $email_user = $request['recipient'];
        $mail = new BootcampMail($request->all());

        Mail::to($email_user)->send($mail);

        return redirect()->route('bootcamp.send')->with('info','enviado');
    }
}
