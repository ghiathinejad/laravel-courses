<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    //
    function sendMail(){
        Mail::to('m.ghiathinjead@gmail.com')->send(new TestMail('maryam' , 1988));

    }
}
