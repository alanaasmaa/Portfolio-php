<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;

class BlogController extends Controller
{
    public function index() {
        $articles = Article::with('tags', 'category')->latest()->paginate(9);

        return view('pages.blog', compact('articles'));
    }

    public function article($slug) {
        $article = Article::findBySlug($slug);

        return view('pages.articles_show', compact('article'));
    }

    public function categories($slug) {
        $articles = Category::findBySlug($slug)->articles()->latest()->paginate(9);

        return view('pages.categories', compact('articles', 'category'));
    }

    public function tags($slug) {
        $articles = Tag::findBySlug($slug)->articles()->latest('articles.created_at')->paginate(9);
        
        return view('pages.tags', compact('articles', 'tag'));
    }

    public function portfolio() {
        $articles = Article::with('tags', 'category')->where('type', 2)->latest()->paginate(9);

        return view('pages.portfolio', compact('articles'));
    }
    public function portfolioItem($slug) {
        $article = Article::findBySlug($slug);

        return view('pages.portfolio_show', compact('article'));
    }
}