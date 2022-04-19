<?php

namespace App\Http\Controllers;

use App\Repositories\CityRepository;
use App\Repositories\FilterRepository;
use App\Repositories\SearchRepository;
use App\Repositories\TopPostListRepository;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    private $searchRepository;
    private $cityRepository;
    private $topPostListRepository;
    private $filterRepository;


    public function __construct()
    {
        $this->searchRepository = new SearchRepository();
        $this->cityRepository = new CityRepository();
        $this->topPostListRepository = new TopPostListRepository();
        $this->filterRepository = new FilterRepository();
    }

    public function index($city, Request $request)
    {

        $cityInfo = $this->cityRepository->getCityInfoByUrl($city);

        $posts = $this->searchRepository->getForSearch($request->q, $cityInfo['id']);

        $topList = $this->topPostListRepository->getTopList($cityInfo['id'], 15);

        $morePosts = false;

        if ($posts->total() < 8) $morePosts = $this->filterRepository->getMorePosts($cityInfo['id'], 10);

        $meta = [
            'title' => 'Поиск: '.$request->q,
            'des' => 'Поиск: '.$request->q,
            'h1' => 'Поиск: '.$request->q,
        ];

        return view('site.index', compact('posts', 'meta', 'topList', 'cityInfo', 'morePosts'));
    }
}
