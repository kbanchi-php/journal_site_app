<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        $data = [
            'articles' => $articles,
        ];
        return view('articles.index', $data);
    }

    public function show($id)
    {
        $article = Article::find($id);
        $data = [
            'id' => $id,
            'article' => $article,
        ];
        return view('articles.show', $data);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(ArticleRequest $request)
    {
        $article = new Article();
        $article->title = $request->title;
        $article->body = $request->body;

        $article->save();

        return redirect('/articles');
    }

    public function edit($id)
    {
        $article = Article::find($id);
        $data = [
            'id' => $id,
            'article' => $article,
        ];
        return view('articles.edit', $data);
    }

    public function update(ArticleRequest $request, $id)
    {
        $article = Article::find($id);
        $article->title = $request->title;
        $article->body = $request->body;

        $article->save();

        return redirect('/articles');
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        return redirect('/articles');
    }
}
