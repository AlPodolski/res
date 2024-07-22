<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Repositories\CityRepository;
use App\Repositories\DataRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{


    private $postRepository;
    private $cityRepository;

    public function __construct()
    {
        $this->cityRepository = new CityRepository();
        $this->dataRepository = new DataRepository();

        parent::__construct();
    }

    public function index(Request $request)
    {
        $cityId = $request->post('city');

        $domain = 'sextime24.com';

        $cityInfo = $this->cityRepository->getAllCityInfoById($cityId);

        $post = Post::where(['fake' => Post::POST_REAL, 'city_id' => $cityInfo['id']])
            ->inRandomOrder()
            ->first();

        if (!$post){

            $post = Post::where(['city_id' => $cityInfo['id']])
                ->inRandomOrder()
                ->first();

        }

        if ($post){

            $result = [
                'name' => $post->name,
                'age' => $post->age,
                'url' => 'https://' . $cityInfo['url'] . '.'.$domain.'/post/' . $post->url,
                'photo' => 'https://' . $cityInfo['url'] . '.' . $domain . '/521-741/thumbs'.$post->photo
            ];

            echo json_encode($result);

        }

        die();

    }
}
