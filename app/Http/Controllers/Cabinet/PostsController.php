<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Requests\AddPostRequest;
use App\Models\Files;
use App\Models\Post;
use App\Models\PostHairColor;
use App\Models\PostIntimHair;
use App\Models\PostMetro;
use App\Models\PostNational;
use App\Models\PostRayon;
use App\Models\PostService;
use App\Models\PostTime;
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

        $tarifList = $dataRepository->tarif();

        return view('cabinet.post.add', compact('serviceList', 'metroList', 'rayonList',
            'timeList', 'placeList', 'nationalList', 'hairColorList', 'intimHairList', 'cityInfo', 'tarifList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(AddPostRequest $request)
    {
        $data =  $request->validated();

        $post = Post::create($data);

        PostNational::create([
            'post_nationals_id' => $post->id,
            'nationals_id' => $data['national_id'],
            'city_id' => $data['city_id'],
        ]);

        PostHairColor::create([
            'posts_id' => $post->id,
            'hair_colors_id' => $data['hair_color_id'],
            'city_id' => $data['city_id'],
        ]);

        PostIntimHair::create([
            'posts_id' => $post->id,
            'intim_hair_id' => $data['hair_color_id'],
            'city_id' => $data['city_id'],
        ]);

        if (isset($data['service']) and $data['service']) foreach ($data['service'] as $item){

            PostService::create([
                'posts_id' => $post->id,
                'service_id' => $item,
                'city_id' => $data['city_id'],
            ]);

        }

        if (isset($data['metro']) and $data['metro']) foreach ($data['metro'] as $item){

            PostMetro::create([
                'posts_id' => $post->id,
                'metros_id' => $item,
                'city_id' => $data['city_id'],
            ]);

        }

        if (isset($data['rayon']) and $data['rayon']) foreach ($data['rayon'] as $item){

            PostRayon::create([
                'posts_id' => $post->id,
                'rayons_id' => $item,
                'city_id' => $data['city_id'],
            ]);

        }

        if (isset($data['time']) and $data['time']) foreach ($data['time'] as $item){

            PostTime::create([
                'posts_id' => $post->id,
                'param_id' => $item,
                'city_id' => $data['city_id'],
            ]);

        }

        $photo = array();

        if ($request->file('gallery')) foreach ($request->file('gallery') as $item){

            $photo[] = [
                'related_id' => $post->id,
                'related_class' => Post::class,
                'file' => '/'.$item->store('/uploads/aa1', 'public'),
                'type' => Files::GALLERY_PHOTO_TYPE
            ];

        }

        $avatar = $request->file('avatar')->store('/uploads/aa1', 'public');

        $photo[] = [
            'related_id' => $post->id,
            'related_class' => Post::class,
            'file' => '/'.$avatar,
            'type' => Files::MAIN_PHOTO_TYPE
        ];

        foreach ($photo as $item){
            Files::create($item);
        }

        return redirect('/cabinet');

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
