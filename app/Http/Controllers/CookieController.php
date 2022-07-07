<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CookieController extends Controller
{
    function create(){
        cookie()->queue(cookie('name','maryam',60));
        cookie()->queue('family','ghiathinejad',60);
    }

    function view(){
        dd(request()->cookie('name'));
    }

    function delete(){
        cookie()->queue(cookie()->forget('name'));

    }
}
