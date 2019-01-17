<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function dateTime()
    {
        return date('d.m.Y H:i:s');
    }

    public function about()
    {
        return view('welcome');
    }

    public function data()
    {
        $userData = [
            'data' => [
                'name' => 'Dmitrii',
                'surname' => 'Iurev',
            ]
        ];

        return $userData;
    }

    public function showLoginForm(Request $request)
    {
        return view('login');
    }

    public function postingLoginData(Request $request)
    {
        $login = $request->input('login');
        $password = $request->input('password');

        if ($login === '111' && $password === '222') {
            return redirect()->route('mainPage');
        }

        return view('login', ['errorMessage' => 'Неправильный логин или пароль']);
    }

    public function page($id = 1)
    {
        return 'Page with id: ' . $id;
    }
}
