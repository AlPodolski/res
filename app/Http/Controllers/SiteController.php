<?php

namespace App\Http\Controllers;

use App\Repositories\CityRepository;
use App\Repositories\MetaRepository;
use App\Repositories\PostsRepository;
use App\Repositories\TopPostListRepository;
use App\Repositories\YandexRepository;
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

    public function index($city, Request $request, YandexRepository $yandexRepository)
    {
        $path = $request->getRequestUri();

        $cityInfo = $this->cityRepository->getCityInfoByUrl($city);

        $posts = $this->postsRepository->getPostsForMainPage(15, $cityInfo['id']);

        $meta = $this->metaRepository->getForMain('/', $cityInfo['id'], $request);

        $topList = $this->topPostListRepository->getTopList($cityInfo['id'], 15);

        $yandexTag = $yandexRepository->getTag($cityInfo['id']);

        return view('site.index', compact('posts', 'cityInfo', 'meta', 'topList', 'path', 'yandexTag'));
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
