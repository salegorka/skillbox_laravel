<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
class ArticlesController extends Controller
{

    public function index()
    {
        $articles = Article::where('published', 1)->latest()->get();
        return view('main', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'slug' => ['required','unique:articles', 'regex:/^[a-zA-Z0-9_-]+$/i'],
            'name' => 'required|min:5|max:255',
            'short-description' => 'required|max:255',
            'description' => 'required'
        ]);
        $data = $request->all();
        $article = new Article();
        $article->slug = $data['slug'];
        $article->name = $data['name'];
        $article->short_description = $data['short-description'];
        $article->description = $data['description'];
        if (isset($data['published']) && $data['published'] == 'on') {
            $article->published = true;
        } else {
            $article->published = false;
        }
        $article->save();
        return redirect('/');
    }
}
