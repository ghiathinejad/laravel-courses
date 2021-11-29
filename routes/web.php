<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/articles',function () {
    return "Articles lists!!!!!";
});

Route::get('/article/{id}/{name}' , function ($id,$name){
    return 'article'.$id.':'.$name;
});

Route::prefix('admin')->group(function (){
    Route::get('/',function () {
        return "admin panel";
    });

    Route::get('/users',function () {
        return "admin users";
    });

    Route::get('/articles',function () {
        return "admin articles";
    });
});


Route::get('/hello/{name}', function ($name) {
    return view('index',[
        'username' => $name
    ]);
});
