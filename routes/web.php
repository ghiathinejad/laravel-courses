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

Route::prefix('admin/article')->group(function (){

    Route::delete('/delete/{id}',function ($id){
        $article = Article::findOrFail($id);

        $article->delete();
        return back();

    });

    Route::get('/list',function (){
        return view('admin.article.list',[
            'articles' => Article::all()
        ]) ;
    });

    Route::get('/create',function (){
       return view('admin.article.create') ;
    });

    Route::post('/create',function (){

/*        $validation = Validator::make(request()->all(),[
            'title'=> 'required|min:4|max:6',
            'body'=> 'required',
        ]);

        if($validation->fails()){
            return redirect()
                ->back()
                ->withErrors($validation);
        }*/

/*        Validator::make(request()->all(),[
            'title'=> 'required|min:4|max:6',
            'body'=> 'required',
        ])->validate();

        Article::create([
            'title' => request('title'),
            'slug_fa' => request('title'),
            'body' => request('body')
        ]);*/


        $validateData = Validator::make(request()->all(),[
            'title'=> 'required|min:4|max:6',
            'body'=> 'required',
        ],[
            'title.required' => 'فیلد مقدار را وارد کنید'
        ])->validated();

        Article::create([
            'title' => $validateData['title'],
            'slug_fa' => $validateData['title'],
            'body' => $validateData['body']
        ]);

        return redirect('/admin/article/create');
    });

    Route::get('/edit/{id}',function ($id){
        $article = Article::findOrFail($id);
        return view('admin.article.edit' , ['article' => $article]) ;
    });

    Route::put('/edit/{id}',function ($id){


        $validateData = Validator::make(request()->all(),[
            'title'=> 'required|min:4|max:6',
            'body'=> 'required',
        ])->validated();


        $article = Article::findOrFail($id);
/*        $article->update([
            'title' => $validateData['title'],
            'slug_fa' => $validateData['title'],
            'body' => $validateData['body']
        ]);*/

        $article->update($validateData);
        return back();
    });
});
