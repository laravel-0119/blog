<?php
/**
 * Created by PhpStorm.
 * User: CoolKid
 * Date: 07.05.2018
 * Time: 21:29
 */


Route::prefix('api')->group(function () {
    Route::get('/', function () {
        return view('welcome.admin');
    });

    Route::post('users', function () {
        return view('admin.users');
    });

});