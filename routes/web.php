<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'MainController@index')->name('site.main.index');
Route::get('/about.html', 'MainController@about')->name('site.main.about');
Route::get('/feedback.html', 'MainController@feedback')->name('site.main.feedback');
Route::post('/feedback.html', 'MainController@feedbackPost')->name('site.main.feedbackPost');


Route::group(['prefix' => 'post'], function() {
    Route::get('/{slug}.html', 'PostController@postBySlug')
        ->name('site.posts.post')
        ->where('slug', '[\:0-9A-Za-z\-]+');

    Route::get('/tag/{tag}', 'PostController@listByTag')
        ->name('site.posts.byTag')
        ->where('tag', '.+');

    Route::get('/section/{section}', 'PostController@listBySection')
        ->name('site.posts.bySection')
        ->where('section', '.+');
});

/**
 * Routes for register and login
 */

Route::get('/register.html', 'AuthController@register')->name('site.auth.register');
Route::post('/register.html', 'AuthController@registerPost')->name('site.auth.registerPost');

Route::get('/login', 'AuthController@login')->name('site.auth.login');
Route::post('/login', 'AuthController@loginPost')->name('site.auth.loginPost');
Route::get('/logout', 'AuthController@logout')->name('site.auth.logout');


Route::get('/test', 'TestController@testGet')
    ->name('testRoute')
    ->middleware('can:update,post');

Route::post('/test', 'TestController@testPost');
Route::get('/test/user', 'TestController@testUser');
Route::get('/test/comment', 'TestController@testComment');

Route::get('/create', 'PostController@create')
    ->name('site.posts.create')
    ->middleware('auth');

Route::post('/create', 'PostController@createPost')
    ->name('site.posts.createPost');

Route::get('/ajax', 'MainController@ajaxSimple')
    ->name('site.main.ajaxSimple');
Route::post('/ajax', 'MainController@postAjaxSimple')
    ->name('site.main.postAjaxSimple')
    ->middleware('api');

Route::get('/feedback2', 'MainController@feedback2')
    ->name('site.main.feedback2');
