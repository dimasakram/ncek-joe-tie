<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(Request $request): View
    {
        $articles = Article::published()
            ->when($request->search, fn ($q) => $q->where('title', 'like', "%{$request->search}%"))
            ->latest('published_at')
            ->paginate(6)
            ->withQueryString();

        return view('article.index', compact('articles'));
    }

    public function show(string $slug): View
    {
        $article = Article::published()->where('slug', $slug)->firstOrFail();
        $latestArticles = Article::published()->where('id', '!=', $article->id)->latest('published_at')->limit(3)->get();

        return view('article.show', compact('article', 'latestArticles'));
    }
}
