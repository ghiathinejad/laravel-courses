<?php

use Illuminate\Support\Facades\Route;
use App\Article;

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
/*    $articles = DB::table('articles')->get();
    dd($articles);*/
/*    $articles = \App\Article::all();
    dd($articles);*/
    $articles = \App\Article::orderBy('id')->get();
    dd($articles);
    return view('welcome');
});

Route::get('/home', 'HomeController@home');

Route::get('/articles',function () {
    return "Articles lists!!!!!";
});

Route::get('/article/{id}/{name}' , function ($id,$name){
    return 'article'.$id.':'.$name;
});

/*Route::prefix('admin')->group(function (){
    Route::get('/',function () {
        return "admin panel";
    });

    Route::get('/users',function () {
        return "admin users";
    });

    Route::get('/articles',function () {
        return "admin articles";
    });
});*/


Route::get('/hello/{name}', function ($name) {
    return view('index',[
        'username' => $name
    ]);
});


Route::get('/articles/seed',function () {
    factory(\App\Article::class,10)->create();
});

Route::prefix('admin/article')->namespace('Admin')->group(function (){

    Route::delete('/delete/{id}','ArticleController@delete');
    Route::get('/list','ArticleController@list');

    Route::get('/create','ArticleController@create');

    Route::post('/create','ArticleController@save');

    Route::get('/edit/{id}','ArticleController@edit');

    Route::put('/edit/{id}','ArticleController@update');
});
