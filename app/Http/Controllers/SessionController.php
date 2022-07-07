<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    function create(){
        session(['key' => 'value','name'=>'maryam']);
    }

    function view(){
        dd(session()->all());
        //dd(session('name'));
        //dd(session()->get('family','ghiathinejad'));
    }

    function delete(){
/*        if(session()->has('key'))
            session()->forget('key');*/

        session()->flush();
    }
}
