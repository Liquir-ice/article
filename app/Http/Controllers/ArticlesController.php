<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// use Request;
use App\Article;
use App\Http\Requests;
use App\Http\Requests\CreateArticleRequest;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class ArticlesController extends Controller
{
    public function index()
    {
        // $articles = Article::all();
        // latest function path : /vendor/laravel/framework/src/Illuminate/Database/Query/Builder.php
        // $articles = Article::latest()->get();
        // $articles = Article::latest('published_at')->get();
        // $articles = Article::order_by('published_at', 'desc')->get();

        // $articles = Article::latest('published_at')->where('published_at', '<=', Carbon::now())->get();
        $articles = Article::latest('published_at')->published()->get();

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

        // dd($article->created_at->year);
        // dd($article->created_at->month);
        // dd($article->created_at->addDays(8)->format('Y-m'));
        // dd($article->created_at->addDays(8)->diffForHumans());

        return view('articles/show', compact('article'));
    }

    public function create()
    {
        return view('articles/create');
    }

    public function store(CreateArticleRequest $request)
    {
        // $input = Request::all();
        // Article::create($input);

        // $input = Request::get('title');
        // $input = Request::get('body');

        // $article = new Article;
        // $article->title = $input['title'];
        // $article->save();

        // pass the variable to article constructor
        // $article = new Article(['title' => $input['title']]);

        // $input['published_at'] = Carbon::now();

        // Article::create(Request::all());

        // validation


        Article::create($request->all());



        return redirect('articles');
    }

    // use Illuminate\Http\Request;
    // quickly develop, but some people think that request should not be in controller
    // public function store(Request $request)
    // {
    //     $this->validation($request, ['title' => 'required', 'body' => 'required']);

    //     Article::create($request->all());

    //     return redirect('articles');

    // }
}
