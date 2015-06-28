<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
 * When i type http://localhost:8080/ , it will take me go to welcome view
 */
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('home', 'WelcomeController@index');

/**
 * When i type http://localhost:8080/contact , it will take me go to welcome controller
 * welcome controller path : app/Http/Controllers/WelcomeController.php
 */
// Route::get('contact', 'WelcomeController@contact');



Route::get('about', 'PagesController@about');

Route::get('contact', 'PagesController@contact');

// Route::get('articles', 'ArticlesController@index');

// Route::get('articles/create', 'ArticlesController@create');
// // When get 'articles/{anythings}', it will go to show controller. So create route must locate before 'articles/{id}'
// Route::get('articles/{id}', 'ArticlesController@show');

// Route::post('articles', 'ArticlesController@store');

// Route::get('articles/{id}/edit', 'ArticlesController@edit');

Route::resource('articles', 'ArticlesController');

// Route::get('foo', function()
// {
//     return 'bar';
// });
