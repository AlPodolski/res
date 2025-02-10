<?php

namespace App\Http\Controllers\Cabinet;

use App\Models\Tarif;
use App\Models\UserChat;
use App\Repositories\CityRepository;
use App\Repositories\DataRepository;
use App\Repositories\PostsRepository;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    public $cityRepository;

    public function __construct()
    {
        $this->cityRepository = new CityRepository();

        parent::__construct();
    }

    public function index($city ,PostsRepository $postsRepository, DataRepository $dataRepository)
    {
        $postsList = $postsRepository->getByUserId(auth()->id());

        $cityInfo = $this->cityRepository->getCityInfoByUrl($city);

        $metro = $dataRepository->metro($cityInfo['id']);

        $notReadMessage = UserChat::where('user_id', auth()->user()->id)->with('notRead')->first();

        $tarifList = Tarif::all();

        return view('cabinet.index', compact('postsList', 'metro',
            'cityInfo', 'notReadMessage', 'tarifList'));
    }
}
