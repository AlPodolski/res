<?php

namespace App\Http\Controllers;

use App\Actions\AddViewToCookie;
use App\Actions\GenerateBreadcrumbMicro;
use App\Actions\GenerateImageMicro;
use App\Repositories\CityRepository;
use App\Repositories\DataRepository;
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
    private $breadMicro;

    public function __construct()
    {
        $this->cityRepository = new CityRepository();
        $this->metaService = new SingleMetaService();
        $this->postRepository = new PostsRepository();
        $this->breadMicro = new GenerateBreadcrumbMicro();

        parent::__construct();
    }

    public function index($city, $url, Request $request, GenerateImageMicro $microImage, DataRepository $dataRepository)
    {

        $cityInfo = $this->cityRepository->getCityInfoByUrl($city);

        if (!$post = $this->postRepository->getPostForSingle($url, $cityInfo['id'])) abort(404);

        (new AddViewToCookie())->add($post->id);

        $metaData = $this->metaService->makeMetaTags($post, $cityInfo);

        $breadMicro = $this->breadMicro->generate($request, $post->name);

        $imageMicro = $microImage->generate($post, $cityInfo['city']);

        $metro = $dataRepository->metro($cityInfo['id']);

        $morePosts = $this->postRepository->getMoreByRayonAndPrice($post, $cityInfo['id'],'default');

        $viewPosts = $this->postRepository->getView();

        return view('post.index', compact('post', 'metro', 'cityInfo', 'metaData',
            'breadMicro', 'imageMicro', 'morePosts', 'viewPosts'));
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
