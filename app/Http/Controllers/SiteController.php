<?php

namespace App\Http\Controllers;

use App\Repositories\CityRepository;
use App\Repositories\PostsRepository;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index($city, PostsRepository $postsRepository, CityRepository $cityRepository)
    {

        $cityInfo = $cityRepository->getCityInfoByUrl($city);

        $posts = $postsRepository->getPostsForMainPage(15, $cityInfo['id']);

        return view('site.index', compact('posts', 'cityInfo'));
    }
}
