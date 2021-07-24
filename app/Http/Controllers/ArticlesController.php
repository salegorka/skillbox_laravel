<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use App\Models\Article;
class ArticlesController extends Controller
{

    public function index(Request $request)
    {
        $notification = "";
        if ($request->session()->has('updated')) {
            $art = Article::where('slug', '=', $request->session()->get('updated'))
                ->first();
            $notification = "Статья с названием " . $art->name . " обновлена.";
        }
        if ($request->session()->has('created')) {
            $art = Article::where('slug', '=', $request->session()->get('created'))
                ->first();
            $notification = "Статья с названием " . $art->name . " создана.";
        }
        if ($request->session()->has('deleted')) {
            $notification = "Статья с названием " . $request->session()
                    ->get('deleted') . " удалена.";
        }
        $articles = Article::where('published', 1)->latest()->get();
        return view('main', compact('articles', 'notification'));
    }

    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(ArticleRequest $request)
    {
        $data = $request->validated();

        if (isset($data['published']) && $data['published'] == 'on') {
            $published = true;
        } else {
            $published = false;
        }
       $article = Article::create([
           'slug' => $data['slug'],
            'name' => $data['name'],
            'short_description' => $data['short-description'],
            'description' => $data['description'],
            'published' => $published
       ]);
        return redirect()->route('main')->with("created", $article->slug);
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $data = $request->validated();
        if (isset($data['published']) && $data['published'] == 'on') {
            $published = true;
        } else {
            $published = false;
        }
        $article->update([
            'slug' => $data['slug'],
            'name' => $data['name'],
            'short_description' => $data['short-description'],
            'description' => $data['description'],
            'published' => $published
        ]);
        return redirect()->route('main')->with("updated", $article->slug);
    }

    public function destroy(Article $article)
    {
        $name = $article->name;
        $article->delete();
        return redirect()->route('main')->with("deleted", $name);
    }
}
