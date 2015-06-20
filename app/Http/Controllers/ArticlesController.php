<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

use Request;
use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class ArticlesController extends Controller
{
    public function index()
    {
        // $articles = Article::all();
        // latest function path : /vendor/laravel/framework/src/Illuminate/Database/Query/Builder.php
        // $articles = Article::latest()->get();
        $articles = Article::latest('published_at')->get();
        // $articles = Article::order_by('published_at', 'desc')->get();

        // return view('articles/index')->with('articles', $articles);
        return view('articles/index', compact('articles'));
    }

    public function show($id)
    {
        // $articles = Article::find($id);
        $article = Article::findOrFail($id);

        // if (is_null($articles))
        // {
        //     abort(404);
        // }
        // die dump function
        // dd($articles);

        return view('articles/show', compact('article'));
    }

    public function create()
    {
        return view('articles/create');
    }

    public function store()
    {
        $input = Request::all();
        // $input = Request::get('title');
        // $input = Request::get('body');

        // $article = new Article;
        // $article->title = $input['title'];
        // $article->save();

        // pass the variable to article constructor
        // $article = new Article(['title' => $input['title']]);

        $input['published_at'] = Carbon::now();

        Article::create($input);

        return redirect('articles');
    }
}
