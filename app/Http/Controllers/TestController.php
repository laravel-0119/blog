<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Phone;
use App\Models\Post;
use App\Models\Upload;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function testGet()
    {
        dump(Auth::id());
        dump(Auth::user());
        dump(Auth::check());
        return 'OK';
    }

    public function testPost()
    {

    }
}
