<?php

namespace App\Http\Controllers;

use App\Repositories\CityRepository;
use App\Repositories\FilterRepository;
use App\Repositories\MetaRepository;
use Illuminate\Http\Request;

class FilterController extends Controller
{

    private $filterRepository;
    private $cityRepository;
    private $metaRepository;

    public function __construct()
    {
        $this->filterRepository = new FilterRepository();
        $this->cityRepository = new CityRepository();
        $this->metaRepository = new MetaRepository();
    }

    public function index($city, $search)
    {

        if (!$filterParams = $this->filterRepository->getFilterParams($search)) abort(404);
        if (!$cityInfo = $this->cityRepository->getCityInfoByUrl($city)) abort(404);

        $posts = $this->filterRepository->getForFilter($filterParams, 15, $cityInfo);

        $meta = $this->metaRepository->getForFilter($search, $cityInfo['id'], $filterParams);

        return view('site.index', compact('posts', 'cityInfo', 'meta'));
    }
}
