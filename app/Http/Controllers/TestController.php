<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class TestController extends Controller
{
    public function dateTime()
    {
        return date('d.m.Y H:i:s');
    }

    public function about()
    {
        return view('layouts.main', [
            'name' => 'Vasya Pupkin',
            //'title' => 'Мой блог'
        ]);
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
        $value1 = $request->cookie('name');

        dump($value1);



        if ($request->has(['login', 'password'])) {
            return 'ERROR!';
        }

        $login = $request->input('login');
        $password = $request->input('password');

        if ($login === '111' && $password === '222') {
            return redirect()->route('mainPage');
        }

        return view('login', ['errorMessage' => 'Неправильный логин или пароль']);
    }

    public function page(Request $request, $id, $data)
    {
        $name = $request->input('name');
        $name3 = $request->query('name');
        $age = $request->input('age');
        $uri = $request->path();

        $input = $request->all();

        // Without Query String...
        $url1 = $request->url();

// With Query String...
        $url2 = $request->fullUrl();

        if ($request->is('page/*')) {
            //dump(true);
        }

        //dump($name, $age, $uri, $url1, $url2, $input, $name3);
        //return 'Page with id: ' . $id . ' and data: ' . $data;
        return response('Hello World')->cookie(
            'name', 'MYCOOKIE', 60
        );
    }
}
