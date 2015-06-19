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
Route::get('/', function () {
    return view('welcome');
});

Route::get('home', 'WelcomeController@index');

/**
 * When i type http://localhost:8080/contact , it will take me go to welcome controller
 * welcome controller path : app/Http/Controllers/WelcomeController.php
 */
Route::get('contact', 'WelcomeController@contact');
