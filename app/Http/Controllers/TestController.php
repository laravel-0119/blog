<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Phone;
use App\Models\Post;
use App\Models\Upload;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function testGet()
    {
        return 'OK';
    }

    public function testPost()
    {

    }
}
