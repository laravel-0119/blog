<?php

Route::get('/', function () {
    return view('admin.index');
});

Route::get('/test', 'IndexController@test');