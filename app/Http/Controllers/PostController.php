<?php

namespace App\Http\Controllers;

use App\Actions\GenerateBreadcrumbMicro;
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
    private GenerateBreadcrumbMicro $breadMicro;

    public function __construct()
    {
        $this->cityRepository = new CityRepository();
        $this->metaService = new SingleMetaService();
        $this->postRepository = new PostsRepository();
        $this->breadMicro = new GenerateBreadcrumbMicro();
    }

    public function index($city, $url, Request $request)
    {

        $cityInfo = $this->cityRepository->getCityInfoByUrl($city);

        if (!$post = $this->postRepository->getPostForSingle($url, $cityInfo['id'])) abort(404);

        $metaData = $this->metaService->makeMetaTags($post, $cityInfo);

        $breadMicro = $this->breadMicro->generate($request);

        return view('post.index', compact('post', 'cityInfo', 'metaData', 'breadMicro'));
    }

    public function more($city, Request $request)
    {

        $ids = explode(',', $request->id);
        $rayon = $request->rayon;
        $price = $request->price;

        $cityInfo = $this->cityRepository->getCityInfoByUrl($city);

        $post = $this->postRepository->getPostForSingleMore($cityInfo['id'], $ids, $price, $rayon);

        if ($post) return view('post.post-item', compact('post'))->render();

    }
}
