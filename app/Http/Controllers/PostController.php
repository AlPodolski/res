<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index($city, $url)
    {
        return view('post.index');
    }
}
