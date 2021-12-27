<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function home(){
        $articles = \App\Article::orderBy('id')->get();
        dd($articles);
        return view('welcome');
    }
}
