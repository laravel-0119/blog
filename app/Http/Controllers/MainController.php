<?php namespace App\Http\Controllers;

use App\Mail\FeedbackMail;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    public function index()
    {
        /*$posts = Post::active()
            ->intime()
            ->orderBy('id', 'DESC')
            ->get();
        */

        /*$posts = Post::with(['comments', 'sections'])
            ->active()
            ->intime()
            ->orderBy('id', 'DESC')
            ->get();*/

        $posts = Cache::remember('mainPostLists', env('CACHE_TIME', 0), function () {
            return Post::with(['comments', 'sections'])
                ->active()
                ->intime()
                ->orderBy('id', 'DESC')
                ->get();
        });


        //dump($posts);

        return view('layouts.primary', [
            'page' => 'pages.main',
            'title' => 'Blogplace :: Блог Дмитрий Юрьев - PHP & JS разработчик, ментор, преподаватель',
            'content' => '<p>Привет, меня зовут Дмитрий Юрьев и я веб разработчик!</p>',
            'image' => [
                'path' => 'assets/images/Me.jpg',
                'alt' => 'Image'
            ],
            'activeMenu' => 'main',
            'posts' => $posts,
        ]);
    }

    public function about()
    {
        return view('layouts.primary', [
            'page' => 'pages.about',
            'title' => 'Обо мне',
            'content' => Page::find(1)->content,
            'link' => 'https://ya.ru',
            /*'image' => [
                'path' => 'assets/images/Me.jpg',
                'alt' => 'Image'
            ],*/
            'activeMenu' => 'about',
        ]);
    }

    public function feedback()
    {
        return view('layouts.primary', [
            'page' => 'pages.feedback',
            'title' => 'Написать мне',
            'activeMenu' => 'feedback',
        ]);
    }

    public function feedbackPost(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50|min:2',
            'email' => 'required|max:255|email',
            'message' => 'required|max:10240|min:10',
        ]);

        /*Mail::raw($request->input('message'), function($message)
        {
            $message->from('openserver@932433.ru', 'Laravel Blog');
            $message->subject('Письмо с сайта');
            $message->to('dmitrii@iurev.ru');
        });*/
        try {
            Mail::to('dmitrii@iurev.ru')
                ->cc('yurev@ntschool.ru')
                ->send(new FeedbackMail($request->all()));

            Log::info('Mail was sent', ['data' => $request->all()]);
        } catch (\Exception $e) {
            Log::error('Mail was not sent', [
                'data' => $request->all(),
                'trace' => $e->getTraceAsString(),
                'error' => $e->getMessage()]);
        }

        return view('layouts.primary', [
            'page' => 'parts.blank',
            'title' => 'Сообщение отправлено!',
            'content' => 'Спасибо за ваше сообщение!',
            'link' => '<a href="javascript:history.back()">Вернуться назад</a>',
            'activeMenu' => 'feedback',
        ]);
    }
}
