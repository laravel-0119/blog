<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:3|max:20',
            'email' => 'required|email',
            'password' => 'required|max:32|min:6',
            'password2' => 'required|same:password',
            'is_confirmed' => 'accepted',
            'invite' => 'regex:/^[a-zA-Z]{3}-[0-9]{3}-[a-zA-Z]{3}$/i'
        ];
    }
}
