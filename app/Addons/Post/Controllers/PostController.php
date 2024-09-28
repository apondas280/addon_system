<?php

namespace App\Addons\Post\Controllers;

use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        return view('post::post.index');
    }
}