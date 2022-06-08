<?php

namespace App\Http\Controllers\Cabinet;

use App\Repositories\PostsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(PostsRepository $postsRepository)
    {
        $postsList = $postsRepository->getByUserId(auth()->id());

        return view('cabinet.index', compact('postsList'));
    }
}
