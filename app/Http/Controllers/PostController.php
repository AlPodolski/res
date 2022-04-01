<?php

namespace App\Http\Controllers;

use App\Repositories\CityRepository;
use App\Repositories\FilterRepository;
use App\Repositories\PostsRepository;
use App\Services\SingleMetaService;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class PostController extends Controller
{

    private $cityRepository;
    private $metaService;

    public function __construct()
    {
        $this->cityRepository = new CityRepository();
        $this->metaService = new SingleMetaService();
    }

    public function index($city, $url ,  PostsRepository $postRepository)
    {

        $cityInfo = $this->cityRepository->getCityInfoByUrl($city);

        if (!$post = $postRepository->getPostForSingle($url, $cityInfo['id'])) abort(404);

        $metaData = $this->metaService->makeMetaTags($post, $cityInfo);

        return view('post.index', compact('post', 'cityInfo', 'metaData'));
    }
}
