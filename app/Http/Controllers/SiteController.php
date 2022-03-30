<?php

namespace App\Http\Controllers;

use App\Repositories\CityRepository;
use App\Repositories\MetaRepository;
use App\Repositories\PostsRepository;
use App\Repositories\TopPostListRepository;
use Illuminate\Http\Request;

class SiteController extends Controller
{

    public $postsRepository;
    public $cityRepository;
    public $metaRepository;
    public $topPostListRepository;

    public function __construct()
    {
        $this->postsRepository = new PostsRepository();
        $this->cityRepository = new CityRepository();
        $this->metaRepository = new MetaRepository();
        $this->topPostListRepository = new TopPostListRepository();
    }

    public function index($city, Request $request)
    {
        $path = $request->getRequestUri();

        $cityInfo = $this->cityRepository->getCityInfoByUrl($city);

        $posts = $this->postsRepository->getPostsForMainPage(15, $cityInfo['id']);

        $meta = $this->metaRepository->getForMain('/', $cityInfo['id']);

        $topList = $this->topPostListRepository->getTopList($cityInfo['id'], 15);

        return view('site.index', compact('posts', 'cityInfo', 'meta', 'topList', 'path'));
    }

    public function more($city)
    {
        $cityInfo = $this->cityRepository->getCityInfoByUrl($city);

        $posts = $this->postsRepository->getPostsForMainPage(15, $cityInfo['id']);

        $data['posts'] = view('site.more', compact('posts'))->render();
        $data['next_page'] = str_replace('http', 'https', $posts->nextPageUrl());

        return json_encode($data);

    }

}
