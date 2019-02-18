<?php namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class MainController extends Controller
{
    public function index()
    {
        $posts = [];

        dump(Route::currentRouteName());

        return view('layouts.primary', [
            'page' => 'pages.main',
            'title' => 'Blogplace :: Блог Дмитрий Юрьев - PHP & JS разработчик, ментор, преподаватель',
            'content' => '',
            'activeMenu' => 'main',
            'posts' => $posts
        ]);
    }

    public function about()
    {
        return view('layouts.primary', [
            'page' => 'pages.about',
            'title' => 'Обо мне',
            'content' => '<p>Привет, меня зовут Дмитрий Юрьев и я веб разработчик!</p>',
            'image' => [
                'path' => 'assets/images/Me.jpg',
                'alt' => 'Image'
            ],
            'activeMenu' => 'about',
        ]);
    }

    public function feedback()
    {
        return view('layouts.primary', [
            'page' => 'pages.feedback',
            'title' => 'Написать мне',
            'content' => '',
            'activeMenu' => 'feedback',
        ]);
    }

    public function orm()
    {
        /*$customer = new Customer();

        $customer->name = 'Сидор';
        $customer->surname = 'Сидоров';
        $customer->patronymic = 'Сидорович';
        $customer->age = 40;
        $customer->birthdate = '1984-06-23';
        $customer->notes = 'sdfsdfsdf';

        $customer->save();*/

        //$customer = Customer::find(2);
        //$customer->delete();

        /*$customer->age = 20;
        $customer->notes = 'Привет, Сидор';

        $customer->save();*/

        /*$customerModel = Customer::create([
            'name' => 'Sidor',
            'surname' => 'Sidorov',
            'age' => 30,
            'birthdate' => '1990-01-30',
            'notes' => 'NTSchool student'
        ]);*/

        $customers = Customer::where('name', 'Ivan')
            ->first();
        dump($customers);




        /*foreach ($customers as $customer)
        {
            echo "{$customer->surname} {$customer->name}, {$customer->age} лет<br>";
        }*/


        //dump($customer->age);

       // echo "{$customer->surname} {$customer->name}, {$customer->age} лет";



        //return 'OK';
    }
}
