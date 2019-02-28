<?php namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Отображение страницы регистрации
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function register()
    {
        return view('layouts.secondary', [
            'page' => 'pages.register',
            'title' => 'Регистрация в блоге',
            'activeMenu' => 'register',
        ]);
    }

    /**
     * POST обработчик регистрации
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function registerPost(RegisterRequest $request)
    {
        $newUserModel = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'phone' => $request->input('phone'),
        ]);

        if ($newUserModel) {
            return view('layouts.secondary', [
                'page' => 'parts.blank',
                'title' => 'Регистрация в блоге',
                'content' => 'Поздравляем, вы успешно зарегистрированы!',
                'link' => '<a href="' . route('site.auth.login') . '">Войти</a>',
                'activeMenu' => 'register',
            ]);
        } else {
            abort(500);
        }
    }

    /**
     * Отображение страницы входа в систему
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login()
    {
        return view('layouts.secondary', [
            'page' => 'pages.login',
            'title' => 'Вход в систему',
            'activeMenu' => 'login',
        ]);
    }

    public function loginPost()
    {
        $remember = $this->request->input('remember') ? true : false;

        $authResult = Auth::attempt([
            'email' => $this->request->input('email'),
            'password' => $this->request->input('password'),
        ], $remember);

        if ($authResult) {
            return redirect()->route('site.main.index');
        } else {
            return redirect()->route('site.auth.login')->with('authError', trans('custom.wrong_password'));
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('site.auth.login');
    }
}
