<?php namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function register()
    {
        debug('Privet');
        //debug($errors);

        $res = DB::table('users')
            ->where('name', '=', 'Petya')
            ->where('password', '=', '123456')
            ->count();
            //->get()[0];

/*
        foreach ($res as $user) {
            echo $user->name . ' - ' . $user->login . '<br>';
        }*/


        debug($res);

        return view('layouts.secondary', [
            'page' => 'pages.register',
            'title' => 'Регистрация в блоге',
            'content' => '',
            'activeMenu' => 'register',
        ]);
    }

    public function registerPost(RegisterRequest $request)
    {
        /*$this->validate($request, [
            'name' => 'required|min:3|max:20',
            'email' => 'required|email',
            'password' => 'required|max:32|min:6',
            'password2' => 'required|same:password',
            'is_confirmed' => 'accepted',
            'invite' => 'regex:/^[a-zA-Z]{3}-[0-9]{3}-[a-zA-Z]{3}$/i'
        ]);*/
/*
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:20',
            'email' => 'required|email',
            'password' => 'required|max:32|min:6',
            'password2' => 'required|same:password',
            'is_confirmed' => 'accepted'
        ]);


        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
*/
        $input = $request->all();
        debug($input);

        try {
            $result = DB::table('users')->insert([
                'login' => $request->input('email'),
                'password' => $request->input('password'),
                'name' => $request->input('name'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        } catch (\Exception $e) {
            $result = false;
        }



        debug($result);

        return 'OK';

        //return redirect()->back();
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
