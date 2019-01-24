<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function about(Request $request, $id = null)
    {
        $allInput = $request->all();
        //dump($allInput);
        //dump($request->url(), $request->fullUrl(), $request->path());

        //$a = $request->input('a', 'Default');

        //dump($request->cookie('name'));
        //dump(Cookie::get('name'));

        return response('Hello World')->cookie(
            'myname', 'value', 3600
        );
    }

    public function response1()
    {
        //return 'OK';

        $content = '<h1>404 Not Found</h1>';


        return response($content,404)
            ->header('Content-Type', 'text/html')
            ->header('X-Powered-By', 'Laravel 5.7')
            ->cookie('mycookie', 'myvalue', 60 * 24);

    }

    public function response2()
    {
        return redirect('/');
    }

    public function response3()
    {
        return redirect()
            ->away('https://ya.ru/');
    }

    public function response4()
    {
        return redirect()
            ->route('loginRoute');
    }

    public function response5()
    {
        return redirect()
            ->action('TestController@dateTime');
    }

    public function response6()
    {
        /*return [
            'name' => 'Abigail',
            'state' => 'CA'
        ];*/

        $string = (string) json_encode([
            'name' => 'Abigail',
            'state' => 'CA'
        ]);

         return response($string)
             ->header('Content-Type', 'application/json');
    }

    public function response7()
    {
        return response()
            ->file(base_path('1.txt'));
    }

    public function response8()
    {
        return response()
            ->download(base_path('files.zip'), 'laravel.zip')
            ->deleteFileAfterSend();

    }
}
