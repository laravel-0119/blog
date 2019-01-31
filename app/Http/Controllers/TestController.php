<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function showLoginForm()
    {
        return view('login', [
            //'name' => 'Dmitrii',
        ]);
    }

    public function postingLoginData(Request $request)
    {
        $login = $request->input('login');
        $password = $request->input('password');

        if ($login === '111' && $password === '222') {
            return redirect()
                ->route('mainPage');
        }

        return view('login', [
            'errorMessage' => 'Неправильный логин или пароль',
            'name' => 'Dmitrii',
        ]);
    }
}
