<?php

namespace App\Http\Controllers;

use App\Mail\MailContact;
use Illuminate\Http\Request;
use App\Http\Requests\CustomRequest;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\CustomRequestMail;

class ContactController extends Controller

{

    public function work(){
        return view('auth/work');
    }


    public function send(CustomRequestMail $request){

        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');

        $informazioni= compact('name', 'email', 'message');

        Mail::to('bradipifoundation@bradipi.com')->send(new MailContact($informazioni));

        return redirect()->route('home');
    }

}
