<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class MainController extends Controller
{
    public function index()
    {
        $user = [
            'data' => [
                'name' => 'Dmitrii',
                'surname' => 'Iurev',
            ]
        ];

        return $user;
    }

    public function blade()
    {
        return view('layouts.primary',[
            'page' => 'login'
        ]);
    }

    public function about(Request $request, $id = null)
    {
        $allInput = $request->all();
        //dump($allInput);
        //dump($request->url(), $request->fullUrl(), $request->path());

        $a = $request->input('a', 'Default');

        //dump($request->cookie('name'));
        //dump(Cookie::get('name'));

        return response('Hello World')->cookie(
            'myname', 'value', 3600
        );
    }

    public function response1()
    {
        return response('<h1>404 Not Found</h1>',404)
            ->header('Content-Type', 'text/plain')
            ->header('X-Powered-By', 'Laravel 5.6')
            ->cookie('mycookie', 'val', 60*24);

    }

    public function response2()
    {
        return redirect('/');
    }

    public function response3()
    {
        return redirect()->away('http://ya.ru/');
    }

    public function response4()
    {
        return redirect()
            ->route('loginRoute');
    }

    public function response5()
    {
        return redirect()
        ->action('MainController@response3');
    }

    public function response6()
    {
        return [
            'name' => 'Abigail',
            'state' => 'CA'
        ];

       /*$string = (string) json_encode([
           'name' => 'Abigail',
           'state' => 'CA'
       ]);

        return response($string)
            ->header('Content-Type', 'application/json');*/
    }

    public function response7()
    {
        return response()
            ->file(base_path('1.txt'));
    }

    public function response8()
    {
        return redirect('http://ya.ru/');
    }
}
