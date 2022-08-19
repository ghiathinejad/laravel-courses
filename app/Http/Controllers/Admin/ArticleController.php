<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    function __construct(){
        $this->middleware('auth')->except(['index']);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
//        $cat = Category::find(2);
//        return $cat->articles()->get();
//
//        $article = Article::find(1);
//        return $article->categories()->get();
//
//        $user = User::find(5);
//        return $user->articles()->get();
//
//        $article = Article::find(6);
//        return $article->user()->first(); //return $article->user;

        return view('admin.article.list' , [
            'articles' => Article::all()
        ]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id){
        $article = Article::find($id);
        //$article->categories()->attach([4,5]);
        $article->categories()->detach([4,2]);

        return view('admin.article.show' , [
            'article' => Article::find($id)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $validate_data = $request->validated();

/*        Article::create([
            'title' => $validate_data['title'],
            'body' => $validate_data['body'],
            'user_id' => auth()->user()->id,
        ]);*/

        $articles = auth()->user()->articles()->create([
            'title' => $validate_data['title'],
            'body' => $validate_data['body']
        ]);

        //$articles->categories()->attach($request->input('categories'));
        $articles->categories()->attach($validate_data['categories']);

        return redirect('/admin/article');
    }

    /**
     * @param Article $article
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Article $article)
    {
        return view('admin.article.edit' , [
            'article' => $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $validate_data = $request->validated();

        $article->update($validate_data);

        $article->categories()->detach();
        $article->categories()->sync($validate_data['categories']);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return back();
    }


}
