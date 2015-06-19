<?php

namespace App\Http\Controllers;

class WelcomeController extends Controller
{

    function __construct()
    {

    }

    public function index()
    {
        // file path : resources/views/pages/index.blade.php
        // return view('pages/index');

        // file path : resources/views/pages/index.blade.php
        // return view('pages.index');

        return view('welcome');
    }

    public function contact()
    {

        return view('pages/contact');
    }
}
