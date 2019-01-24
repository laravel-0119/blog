<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('mainPage');

Route::get('/test', function () {
    return "<h1>Hello</h1>";
});

Route::get('/datetime', function () {
    return date('d.m.Y H:i:s');
});

Route::get('/about', 'TestController@about');
/*
Route::get('/404', function () {
    return view('404');
});
*/
Route::view('/hfghfghfghfghgfh', 'asdasdasd');

Route::get('/test/date', 'TestController@dateTime');
Route::get('/test/about', 'TestController@about');
Route::get('/test/user', 'TestController@data');

Route::put('/testput', function() {
    return 'PUT!!!';
});


Route::get('/login', 'TestController@showLoginForm')->name('loginRoute');
Route::post('/login', 'TestController@postingLoginData')->name('loginRoutePost');

Route::redirect('/403', '/');

Route::get('/page/{id}/{data}', 'TestController@page')
    ->where('id', '[0-9]+')
    ->name('pageRoute');


Route::group(['prefix' => 'test'], function () {
    Route::get('response1', 'MainController@response1');
    Route::get('response2', 'MainController@response2');
    Route::get('response3', 'MainController@response3');
    Route::get('response4', 'MainController@response4');
    Route::get('response5', 'MainController@response5');
    Route::get('response6', 'MainController@response6');
    Route::get('response7', 'MainController@response7');
    Route::get('response8', 'MainController@response8');
});