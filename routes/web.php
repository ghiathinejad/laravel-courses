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
    //dd($articles);
    return view('welcome');
});

Route::get('/home', 'HomeController@home');

Route::get('/articles',function () {
    return "Articles lists!!!!!";
});

Route::get('/article/{articleSlug}' , 'ArticleController@single');

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

Route::prefix('admin')->namespace('Admin')->group(function (){
    //Route::delete('/delete/{id}','Admin\ArticleController@delete');
    Route::delete('/delete/{id}','ArticleController@delete');
    Route::get('/list','ArticleController@index');
    Route::get('/create','ArticleController@create');
    Route::post('/create','ArticleController@save');
    //Route::get('/edit/{id}','ArticleController@edit');
    //Route::get('/edit/{article}','ArticleController@edit');
    Route::get('/edit/{articleSlug}','ArticleController@edit')->middleware('auth');
    Route::put('/edit/{id}','ArticleController@update');
    Route::resource('article','ArticleController')->except(['show']);
    //Route::resource('article','ArticleController')->only(['index','edit']);
});


Route::get('/mail/send' , 'SendMailController@sendMail');

Route::get('/session/create' , 'SessionController@create');
Route::get('/session/view' , 'SessionController@view');
Route::get('/session/delete' , 'SessionController@delete');

Route::get('/cookie/create' , 'CookieController@create');
Route::get('/cookie/view' , 'CookieController@view');
Route::get('/cookie/delete' , 'CookieController@delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
