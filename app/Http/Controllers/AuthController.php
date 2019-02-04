<?php namespace App\Http\Controllers;

class AuthController extends Controller
{
    public function register()
    {
        return view('layouts.secondary', [
            'page' => 'pages.register',
            'title' => 'Регистрация в блоге',
            'content' => '',
            'activeMenu' => 'register',
        ]);
    }

    public function registerPost()
    {
        return redirect()->back();
    }

    public function login()
    {
        return view('layouts.secondary', [
            'page' => 'pages.login',
            'title' => 'Вход в систему',
            'content' => '',
            'activeMenu' => 'feedback',
        ]);
    }

    public function loginPost()
    {
        return redirect()->back();
    }
}
