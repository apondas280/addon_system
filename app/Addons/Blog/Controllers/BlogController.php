<?php

namespace App\Addons\Blog\Controllers;

use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index()
    {
        return view('blog::blog.index');
    }
}