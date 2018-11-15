<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\mymail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send(Request $request){
        $name = $request->name;
        $email = $request->email;
        $text = $request->text;
        Mail::to('sirakanyanarman@gmail.com')->send(new mymail($name,$email,$text));
        return redirect()->back();
    }
}
