<?php

namespace App\Http\Controllers;

use App\Repositories\CityRepository;
use App\Repositories\MetaRepository;
use App\Repositories\PostsRepository;
use Illuminate\Http\Request;

class SiteController extends Controller
{

    public $postsRepository;
    public $cityRepository;
    public $metaRepository;

    public function __construct()
    {
        $this->postsRepository = new PostsRepository();
        $this->cityRepository = new CityRepository();
        $this->metaRepository = new MetaRepository();
    }

    public function index($city)
    {

        $cityInfo = $this->cityRepository->getCityInfoByUrl($city);

        $posts = $this->postsRepository->getPostsForMainPage(15, $cityInfo['id']);

        $meta = $this->metaRepository->getForMain('/', $cityInfo['id']);

        return view('site.index', compact('posts', 'cityInfo', 'meta'));
    }
}
