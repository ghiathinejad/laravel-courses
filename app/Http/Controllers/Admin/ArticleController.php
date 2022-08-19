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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat = Category::find(2);
        return $cat->articles()->get();

        $article = Article::find(1);
        return $article->categories()->get();

        $user = User::find(5);
        return $user->articles()->get();

        $article = Article::find(6);
        return $article->user()->first(); //return $article->user;

        return view('admin.article.list' , [
            'articles' => Article::all()
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

        auth()->user()->articles()->create([
            'title' => $validate_data['title'],
            'body' => $validate_data['body']
        ]);

        return redirect('/admin/article');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
