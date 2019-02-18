<?php namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class MainController extends Controller
{
    public function index()
    {
        $posts = [];

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

    public function relations()
    {
        /*$userModel = User::find(1);
        $userProfile = $userModel->profile;


        dump($userModel, $userProfile);
        dump($userProfile->name, $userProfile->birthdate);


        $user = Profile::where('name', 'Дмитрий Юрьев')
            ->first()
            ->user;

        $user->password = '555555';
        $user->save();*/


        /*$postsByUser1 = User::find(1)
            ->posts;

        $postsByUser2 = Post::where('user_id', 1)
            ->get();

        $postsByUser3 = DB::table('posts')
            ->where('user_id', 1)
            ->get();

        dump($postsByUser1, $postsByUser2, $postsByUser3);*/


        /*$author = Post::where('title', 'Post 1')
            ->first()
            ->user
            ->profile
            ->name;

        dump($author);*/


        /*$tags = Post::where('title', 'Post 3')
            ->first()
            ->tags;

        dump($tags);
        $tagsString = '';

        foreach ($tags as $tag) {
            $tagsString .= $tag->name . ', ';
        }*/

        //dump($tagsString);

        //dump(rtrim(trim($tagsString), ','));

        //return 'OK';

        /*$posts1 = Post::has('tags')
            ->get();


        $posts2 = Post::has('tags', '>=', 2)->get();
        dump($posts1, $posts2);
        dump(Post::doesntHave('tags')->get());*/

        /*$postsByTag = Tag::where('name', 'Новость')
            ->first()
            ->posts;

        dump($postsByTag);*/

        /*$post = new Post([
            'title' => 'Post4',
            'slug' => '444',
            'tagline' => 'nhgnghngh',
        ]);*/

        //$post->save();

        //dump($post);

        //$user = User::find(1);
        //$user->posts()->save($post);

        Post::find(1)
            ->tags()
            ->sync([
                Tag::where('name', 'Новость')->first()->id,
                Tag::where('name', 'Статья')->first()->id
            ]);

        Post::find(2)
            ->tags()
            ->sync([
                Tag::where('name', 'Объявление')->first()->id,
            ]);

        return 'OK';
    }
}
