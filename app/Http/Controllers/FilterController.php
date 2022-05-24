<?php

namespace App\Http\Controllers;

use App\Actions\GenerateMicroDataForCatalog;
use App\Repositories\CityRepository;
use App\Repositories\FilterRepository;
use App\Repositories\MetaRepository;
use App\Repositories\TopPostListRepository;
use App\Services\FilterDataHelper;
use Illuminate\Http\Request;

class FilterController extends Controller
{

    private FilterRepository $filterRepository;
    private CityRepository $cityRepository;
    private MetaRepository $metaRepository;
    private TopPostListRepository $topPostListRepository;
    private  $microData;

    public function __construct()
    {
        $this->filterRepository = new FilterRepository();
        $this->cityRepository = new CityRepository();
        $this->metaRepository = new MetaRepository();
        $this->topPostListRepository = new TopPostListRepository();
        $this->microData = new GenerateMicroDataForCatalog();
    }

    public function index($city, $search, Request $request)
    {

        if (!$filterParams = FilterDataHelper::checkData($this->filterRepository->getFilterParams($search)))
            abort(404);
        if (!$cityInfo = $this->cityRepository->getCityInfoByUrl($city)) abort(404);

        $path = '/'.$request->path();

        $posts = $this->filterRepository->getForFilter($filterParams, 15, $cityInfo);

        $meta = $this->metaRepository->getForFilter($search, $cityInfo['id'], $filterParams);

        $topList = $this->topPostListRepository->getTopList($cityInfo['id'], 15);

        $microData = $this->microData->generate($meta['title'], $posts, $search, $cityInfo['id']);

        $morePosts = false;

        if ($posts->total() < 8) $morePosts = $this->filterRepository->getMorePosts($cityInfo['id'], 10);

        return view('site.index',
            compact(
                'posts', 'cityInfo', 'meta', 'filterParams', 'topList', 'path', 'morePosts', 'microData'
            ));
    }
}
