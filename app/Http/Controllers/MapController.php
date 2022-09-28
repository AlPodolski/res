<?php

namespace App\Http\Controllers;

use App\Repositories\CityRepository;
use App\Repositories\MetaRepository;
use App\Repositories\PostsRepository;
use Illuminate\Http\Request;

class MapController extends Controller
{

    public $postsRepository;
    public $cityRepository;
    public $metaRepository;

    public function __construct()
    {
        $this->postsRepository = new PostsRepository();
        $this->cityRepository = new CityRepository();
        $this->metaRepository = new MetaRepository();

        parent::__construct();
    }

    public function index($city, Request $request)
    {

        if (!$cityInfo = $this->cityRepository->getCityInfoByUrl($city)) abort(404);

        $meta = $this->metaRepository->getForMain($request->path(), $cityInfo['id'], $request);

        $posts = $this->postsRepository->getForMap($cityInfo['id']);

        return view('map.index',
            compact('cityInfo', 'meta', 'posts')
        );
    }
}
