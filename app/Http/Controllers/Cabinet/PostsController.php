<?php

namespace App\Http\Controllers\Cabinet;

use App\Actions\Publication;
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
use App\Models\Tarif;
use App\Models\UserChat;
use App\Repositories\CityRepository;
use App\Repositories\DataRepository;
use App\Repositories\PostsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{

    private $cityRepository;
    private $postRepository;
    private $dataRepository;

    public function __construct()
    {
        $this->cityRepository = new CityRepository();
        $this->postRepository = new PostsRepository();
        $this->dataRepository = new DataRepository();

        parent::__construct();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create($city)
    {

        $cityInfo = $this->cityRepository->getCityInfoByUrl($city);

        $serviceList = $this->dataRepository->service();
        $metroList = $this->dataRepository->metroList($cityInfo['id']);
        $rayonList = $this->dataRepository->rayon($cityInfo['id']);

        $timeList = $this->dataRepository->time();
        $placeList = $this->dataRepository->place();
        $nationalList = $this->dataRepository->national();
        $hairColorList = $this->dataRepository->hairColor();
        $intimHairList = $this->dataRepository->intimHair();

        $tarifList = $this->dataRepository->tarif();

        $cityList = $this->cityRepository->getAllCity();

        $notReadMessage = UserChat::where('user_id', auth()->user()->id)->with('notRead')->first();

        return view('cabinet.post.add', compact('serviceList', 'metroList', 'rayonList',
            'timeList', 'placeList', 'nationalList', 'hairColorList', 'intimHairList', 'cityInfo', 'tarifList',
            'cityList', 'notReadMessage'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(AddPostRequest $request)
    {
        $data = $request->validated();

        $post = Post::create($data);

        $post->publication_status = Post::POST_ON_MODERATION;

        $post->phone = preg_replace('/[^0-9]/', '', $post->phone);

        $post->save();

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
            'intim_hair_id' => $data['intim_hair_color_id'],
            'city_id' => $data['city_id'],
        ]);

        if (isset($data['service']) and $data['service']) foreach ($data['service'] as $item) {

            PostService::create([
                'posts_id' => $post->id,
                'service_id' => $item,
                'city_id' => $data['city_id'],
            ]);

        }

        if (isset($data['metro']) and $data['metro']) foreach ($data['metro'] as $item) {

            PostMetro::create([
                'posts_id' => $post->id,
                'metros_id' => $item,
                'city_id' => $data['city_id'],
            ]);

        }

        if (isset($data['rayon_id']) and $data['rayon_id']) {

            PostRayon::create([
                'posts_id' => $post->id,
                'rayons_id' => $data['rayon_id'],
                'city_id' => $data['city_id'],
            ]);

        }

        if (isset($data['time']) and $data['time']) foreach ($data['time'] as $item) {

            PostTime::create([
                'posts_id' => $post->id,
                'param_id' => $item,
                'city_id' => $data['city_id'],
            ]);

        }

        $photo = array();

        if ($request->file('gallery')) foreach ($request->file('gallery') as $item) {

            $photo[] = [
                'related_id' => $post->id,
                'related_class' => Post::class,
                'file' => '/' . $item->store('/uploads/aa1', 'public'),
                'type' => Files::GALLERY_PHOTO_TYPE
            ];

        }

        $avatar = '/' . $request->file('avatar')->store('/uploads/aa1', 'public');

        $post->photo = $avatar;

        $post->save();

        if ($photo) foreach ($photo as $item) {
            Files::create($item);
        }

        if (isset($_POST['add_more']) and $_POST['add_more']){

            $serviceList = $this->dataRepository->service();
            $metroList = $this->dataRepository->metroList($post->city_id);
            $rayonList = $this->dataRepository->rayon($post->city_id);

            $timeList = $this->dataRepository->time();
            $placeList = $this->dataRepository->place();
            $nationalList = $this->dataRepository->national();
            $hairColorList = $this->dataRepository->hairColor();
            $intimHairList = $this->dataRepository->intimHair();

            $tarifList = $this->dataRepository->tarif();

            $cityList = $this->cityRepository->getAllCity();

            $cityInfo = $this->cityRepository->getAllCityInfoById($post->city_id);

            $notReadMessage = UserChat::where('user_id', auth()->user()->id)->with('notRead')->first();

            return view('cabinet.post.add_more', compact('serviceList', 'metroList', 'rayonList',
                'timeList', 'placeList', 'nationalList', 'hairColorList', 'intimHairList', 'cityInfo', 'tarifList',
                'cityList', 'notReadMessage', 'post'));

        }

        return redirect('/cabinet');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($city, $id)
    {
        $cityInfo = $this->cityRepository->getCityInfoByUrl($city);

        $serviceList = $this->dataRepository->service();
        $metroList = $this->dataRepository->metroList($cityInfo['id']);
        $rayonList = $this->dataRepository->rayon($cityInfo['id']);

        $timeList = $this->dataRepository->time();
        $placeList = $this->dataRepository->place();
        $nationalList = $this->dataRepository->national();
        $hairColorList = $this->dataRepository->hairColor();
        $intimHairList = $this->dataRepository->intimHair();

        $tarifList = $this->dataRepository->tarif();

        $post = $this->postRepository->getById($id);

        $cityList = $this->cityRepository->getAllCity();

        $notReadMessage = UserChat::where('user_id', auth()->user()->id)->with('notRead')->first();

        return view('cabinet.post.edit', compact('post', 'serviceList', 'metroList', 'rayonList',
            'timeList', 'placeList', 'nationalList', 'hairColorList', 'intimHairList', 'cityInfo', 'tarifList',
            'cityList', 'notReadMessage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AddPostRequest $request, $city, $id)
    {

        $cityInfo = $this->cityRepository->getCityInfoByUrl($city);

        $post = Post::findOrFail($id);

        if ($post->user_id != auth()->id()) abort(403);

        $data = $request->validated();

        if ($post->update($data)) {

            $post->phone = preg_replace('/[^0-9]/', '', $post->phone);

            $post->save();

            \DB::table('post_nationals')->where('post_nationals_id', $post->id)->delete();

            PostNational::create([
                'post_nationals_id' => $post->id,
                'nationals_id' => $data['national_id'],
                'city_id' => $data['city_id'],
            ]);

            \DB::table('post_hair_colors')->where('posts_id', $post->id)->delete();

            PostHairColor::create([
                'posts_id' => $post->id,
                'hair_colors_id' => $data['hair_color_id'],
                'city_id' => $data['city_id'],
            ]);

            \DB::table('post_intim_hairs')->where('posts_id', $post->id)->delete();

            PostIntimHair::create([
                'posts_id' => $post->id,
                'intim_hair_id' => $data['intim_hair_color_id'],
                'city_id' => $data['city_id'],
            ]);

            if (isset($data['service']) and $data['service']) foreach ($data['service'] as $item) {

                \DB::table('post_services')->where('posts_id', $post->id)->delete();

                PostService::create([
                    'posts_id' => $post->id,
                    'service_id' => $item,
                    'city_id' => $data['city_id'],
                ]);

            }

            if (isset($data['metro']) and $data['metro']) foreach ($data['metro'] as $item) {

                \DB::table('post_metros')->where('posts_id', $post->id)->delete();

                PostMetro::create([
                    'posts_id' => $post->id,
                    'metros_id' => $item,
                    'city_id' => $data['city_id'],
                ]);

            }

            if (isset($data['rayon_id']) and $data['rayon_id']) {

                \DB::table('post_rayons')->where('posts_id', $post->id)->delete();

                PostRayon::create([
                    'posts_id' => $post->id,
                    'rayons_id' => $data['rayon_id'],
                    'city_id' => $data['city_id'],
                ]);

            }

            if (isset($data['time']) and $data['time']) foreach ($data['time'] as $item) {

                \DB::table('post_times')->where('posts_id', $post->id)->delete();

                PostTime::create([
                    'posts_id' => $post->id,
                    'param_id' => $item,
                    'city_id' => $data['city_id'],
                ]);

            }

            $photo = array();

            if ($request->file('gallery')) foreach ($request->file('gallery') as $item) {

                $photo[] = [
                    'related_id' => $post->id,
                    'related_class' => Post::class,
                    'file' => '/' . $item->store('/uploads/aa1', 'public'),
                    'type' => Files::GALLERY_PHOTO_TYPE
                ];

            }

            if ($avatar = $request->file('avatar')) {

                $path = (storage_path('app/public' . $post->photo));

                if (file_exists($path)) {

                    unlink($path);

                }

                $avatar = '/' . $avatar->store('/uploads/aa1', 'public');

                $post->photo = $avatar;

                $post->save();

            }


            if ($photo) foreach ($photo as $item) {
                Files::create($item);
            }

            return redirect('/cabinet')
                ->with(['success' => 'Запись сохранена']);

        }

        return back()
            ->withErrors(['msg' => 'Ошибка'])
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy($city, $id)
    {
        $post = Post::findOrFail(['id' => $id])->first();

        if ($post->user_id != auth()->id()) abort(403);

        $post->delete();

        return redirect('/cabinet');
    }

    public function publication($city, Request $request)
    {

        $id = $request->post('id');

        $post = Post::find($id);

        if ($post->user_id != auth()->user()->id) abort(403);

        $result = (new Publication())->publication($post);

        return $result;

    }

    public function startAll()
    {
        $posts = Post::where('user_id', auth()->user()->id)
            ->where('publication_status', Post::POST_DONT_PUBLICATION)
            ->with('user', 'tarif')
            ->get();

        if ($posts) {

            foreach ($posts as $post) {

                (new Publication())->publication($post);

            }

            return 'Готово, включено - ' .$posts->count() .' шт';

        }

        return 'Нет доступных анкет для публикации';

    }

    public function up(Request $request)
    {

        $upCost = 70;

        $id = $request->post('id');

        $post = Post::where('id', $id)
            ->where('user_id', auth()->user()->id)
            ->with('user')->first();

        if (!$post) abort(404);

        if ($post->user->cash < $upCost) return 'Недостаточно средств';

        $post->user->cash = $post->user->cash - $upCost;

        $post->user->save();

        $post->sorting = time();

        $post->save();

        return 'Анкета поднята';

    }

    public function updateTarif(Request $request)
    {

        $postId = $request->post('id');
        $tarifId = $request->post('tarif_id');

        $post = Post::where('id', $postId)->where('user_id', auth()->user()->id)->first();

        $tarif = Tarif::where('id', $tarifId)->first();

        if ($post and $tarif){

            $post->tarif_id = $tarif->id;

            $post->save();

        }

    }
    public function updateTarifAll(Request $request)
    {

        $ids = $request->input('ids', []);

        $tarifId = $request->post('tarif');

        $posts = Post::whereIn('id',  $ids)
            ->where('user_id', auth()->user()->id)->get();

        $tarif = Tarif::where('id', $tarifId)->first();

        if ($tarif and $posts->count()){

            foreach ($posts as $post){

                $post->tarif_id = $tarif->id;

                $post->save();

            }

        }

    }

    public function updatePhone(Request $request)
    {

        $ids = $request->input('ids', []);

        $phone = $request->post('phone');

        $posts = Post::whereIn('id',  $ids)
            ->where('user_id', auth()->user()->id)->get();

        foreach ($posts as $post){

            $post->phone = preg_replace('/[^0-9]/', '', $phone);

            $post->save();

        }

    }


}
