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
    private $postRepository;

    public function __construct()
    {
        $this->cityRepository = new CityRepository();
        $this->metaService = new SingleMetaService();
        $this->postRepository = new PostsRepository();
    }

    public function index($city, $url)
    {

        $cityInfo = $this->cityRepository->getCityInfoByUrl($city);

        if (!$post = $this->postRepository->getPostForSingle($url, $cityInfo['id'])) abort(404);

        $metaData = $this->metaService->makeMetaTags($post, $cityInfo);

        return view('post.index', compact('post', 'cityInfo', 'metaData'));
    }

    public function more($city, Request $request)
    {

        $ids = explode(',', $request->id);

        $cityInfo = $this->cityRepository->getCityInfoByUrl($city);

        $post = $this->postRepository->getPostForSingleMore($cityInfo['id'], $ids);

        return view('post.post-item', compact('post'))->render();
    }
}
