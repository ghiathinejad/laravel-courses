<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    //
    public function list(){
        return view('admin.article.list',[
            'articles' => Article::all()
        ]) ;
    }

    public function delete($id){
        $article = Article::findOrFail($id);

        $article->delete();
        return back();

    }

    function create(){
        return view('admin.article.create') ;
    }

    function save(){

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
    }

    function edit(Article $article){
        //$article = Article::findOrFail($id);
        return view('admin.article.edit' , ['article' => $article]) ;
    }

    function update(ArticleRequest $request,$id){

/*        $validateData = Validator::make(request()->all(),[
            'title'=> 'required|min:4|max:6',
            'body'=> 'required',
        ])->validated();*/

/*        $validateData = $this->validate(request(),[
            'title'=> 'required|min:4|max:6',
            'body'=> 'required',
        ]);*/

        $validateData = $request->validated();


        $article = Article::findOrFail($id);
        /*        $article->update([
                    'title' => $validateData['title'],
                    'slug_fa' => $validateData['title'],
                    'body' => $validateData['body']
                ]);*/

        $article->update($validateData);
        return back();
    }
}
