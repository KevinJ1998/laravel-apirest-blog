<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleControler extends Controller
{
    public function index()
    {
        return Article::all();
    }

    public function show(Article $article)
    {
        return $article;
    }

    public function store(Request $request)
    {
        $article = Article::create($request->all());
        return response()->json($article, 201);
    }

    public function update(Request $request, Article $article)
    {
        $article->update($request->all());
        return response()->json($article, 200);
    }

    public function delete(Request $request, Article $article)
    {
        try {
            $article->delete();
        } catch (\Exception $e) {
            print $e;
        }
        return response()->json(null, 204);
    }
}
