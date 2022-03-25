<?php

namespace App\Http\Controllers;

use App\Repositories\CityRepository;
use App\Repositories\FilterRepository;
use App\Repositories\PostsRepository;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class PostController extends Controller
{

    private $cityRepository;

    public function __construct()
    {
        $this->cityRepository = new CityRepository();
    }

    public function index($city, $url ,  PostsRepository $postRepository)
    {

        $cityInfo = $this->cityRepository->getCityInfoByUrl($city);

        if (!$post = $postRepository->getPostForSingle($url, $cityInfo['id'])) abort(404);

        return view('post.index', compact('post', 'cityInfo'));
    }
}
