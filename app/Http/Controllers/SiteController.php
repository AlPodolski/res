<?php

namespace App\Http\Controllers;

use App\Repositories\PostsRepository;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index($city, PostsRepository $postsRepository)
    {
        $posts = $postsRepository->getPostsForMainPage(15);

        return view('site.index', compact('posts'));
    }
}
