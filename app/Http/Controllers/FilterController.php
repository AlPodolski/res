<?php

namespace App\Http\Controllers;

use App\Actions\Canonical;
use App\Actions\GenerateBreadcrumbMicro;
use App\Actions\GenerateMicroDataForCatalog;
use App\Repositories\CityRepository;
use App\Repositories\DataRepository;
use App\Repositories\FilterRepository;
use App\Repositories\MetaRepository;
use App\Repositories\TopPostListRepository;
use App\Services\FilterDataHelper;
use Illuminate\Http\Request;

class FilterController extends Controller
{

    private $filterRepository;
    private $cityRepository;
    private $metaRepository;
    private $topPostListRepository;
    private $microData;
    private $breadMicro;

    public function __construct()
    {
        $this->filterRepository = new FilterRepository();
        $this->cityRepository = new CityRepository();
        $this->metaRepository = new MetaRepository();
        $this->topPostListRepository = new TopPostListRepository();
        $this->microData = new GenerateMicroDataForCatalog();
        $this->breadMicro = new GenerateBreadcrumbMicro();

        parent::__construct();
    }

    public function index($city, $search, Request $request, DataRepository $dataRepository)
    {

        if (!$filterParams = FilterDataHelper::checkData($this->filterRepository->getFilterParams($search)))
            abort(404);
        if (!$cityInfo = $this->cityRepository->getCityInfoByUrl($city)) abort(404);

        $path = (new Canonical())->get($request->getRequestUri());

        $posts = $this->filterRepository->getForFilter($filterParams, $this->limit, $cityInfo, $this->sort);

        $meta = $this->metaRepository->getForFilter($search, $cityInfo['id'], $filterParams, $request);

        $topList = $this->topPostListRepository->getTopList($cityInfo['id'], 15);

        $breadMicro = $this->breadMicro->generate($request, $meta['h1']);

        $microData = false;

        if ($posts->count()) $microData = $this->microData->generate($meta['title'], $posts, $search, $cityInfo['id']);

        $morePosts = false;

        if ($posts->total() < 8) $morePosts = $this->filterRepository->getMorePosts($cityInfo['id'], 10);

        $metro = $dataRepository->metro($cityInfo['id']);

        $limit = $this->limit;
        $sort = $this->sort;

        return view('site.index',
            compact(
                'posts', 'cityInfo', 'meta', 'filterParams', 'topList',
                'path', 'morePosts', 'microData', 'breadMicro', 'limit', 'sort','metro'
            ));
    }

    public function more($city, $search)
    {
        if (!$filterParams = FilterDataHelper::checkData($this->filterRepository->getFilterParams($search)))
            abort(404);
        if (!$cityInfo = $this->cityRepository->getCityInfoByUrl($city)) abort(404);

        $posts = $this->filterRepository->getForFilter($filterParams, $this->limit, $cityInfo, $this->sort);

        $data['posts'] = view('site.more', compact('posts', 'cityInfo'))->render();
        $data['next_page'] = str_replace('http', 'https', $posts->nextPageUrl());

        return json_encode($data);
    }
}
