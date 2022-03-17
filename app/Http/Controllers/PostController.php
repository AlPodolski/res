<?php

namespace App\Http\Controllers;

use App\Repositories\PostsRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index($city, $url ,  PostsRepository $postRepository)
    {

        if (!$post = $postRepository->getPostForSingle($url)) abort(404);

        return view('post.index', compact('post'));
    }
}
