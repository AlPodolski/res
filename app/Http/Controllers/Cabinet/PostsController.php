<?php

namespace App\Http\Controllers\Cabinet;

use App\Models\Post;
use App\Repositories\CityRepository;
use App\Repositories\DataRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create($city, DataRepository $dataRepository, CityRepository $cityRepository)
    {

        $cityInfo = $cityRepository->getCityInfoByUrl($city);

        $serviceList = $dataRepository->service();
        $metroList = $dataRepository->metroList($cityInfo['id']);
        $rayonList = $dataRepository->rayon($cityInfo['id']);
        $timeList = $dataRepository->time();
        $placeList = $dataRepository->place();
        $nationalList = $dataRepository->national();
        $hairColorList = $dataRepository->hairColor();
        $intimHairList = $dataRepository->intimHair();

        return view('cabinet.post.add', compact('serviceList', 'metroList', 'rayonList',
            'timeList', 'placeList', 'nationalList', 'hairColorList', 'intimHairList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
