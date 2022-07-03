<?php

namespace App\Http\Controllers;

use App\Actions\Canonical;
use App\Repositories\CityRepository;
use App\Repositories\DataRepository;
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

        parent::__construct();
    }

    public function index($city, Request $request, YandexRepository $yandexRepository, DataRepository $dataRepository)
    {

        $path = (new Canonical())->get($request->getRequestUri());

        $cityInfo = $this->cityRepository->getCityInfoByUrl($city);

        $posts = $this->postsRepository->getPostsForMainPage($this->limit, $cityInfo['id'], $this->sort);

        $meta = $this->metaRepository->getForMain('/', $cityInfo['id'], $request);

        $topList = $this->topPostListRepository->getTopList($cityInfo['id'], 15);

        $yandexTag = $yandexRepository->getTag($cityInfo['id']);

        $metro = $dataRepository->metro($cityInfo['id']);

        $limit = $this->limit;
        $sort = $this->sort;

        return view('site.index', compact('posts', 'metro', 'cityInfo', 'meta', 'topList', 'path', 'yandexTag', 'limit', 'sort'));
    }

    public function more($city)
    {
        $cityInfo = $this->cityRepository->getCityInfoByUrl($city);

        $posts = $this->postsRepository->getPostsForMainPage($this->limit, $cityInfo['id'], $this->sort);

        $data['posts'] = view('site.more', compact('posts'))->render();
        $data['next_page'] = str_replace('http', 'https', $posts->nextPageUrl());

        return json_encode($data);

    }

    public function map($city, DataRepository $dataRepository)
    {
        $cityInfo = $this->cityRepository->getCityInfoByUrl($city);

        $posts = $this->postsRepository->all( $cityInfo['id']);

        $data = $dataRepository->all($cityInfo['id']);

        return response()->view('site.map', compact('posts', 'data'))
            ->header('content-type', 'text/xml;charset=UTF-8')
            ;
    }

}
