<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Metro;
use App\Models\Post;
use App\Models\Rayon;
use App\Repositories\DataRepository;
use App\Repositories\PostsRepository;
use Illuminate\Http\Request;
use Itstructure\GridView\DataProviders\EloquentDataProvider;

class PostController extends Controller
{

    private $postRepository;
    private $dataRepository;

    public function __construct()
    {
        $this->postRepository = new PostsRepository();
        $this->dataRepository = new DataRepository();

        parent::__construct();
    }

    public function index(Request $request)
    {

        $posts = Post::query()->with('city', 'avatar');

        $dataProvider = new EloquentDataProvider($posts);

        $gridData = [
            'dataProvider' => $dataProvider,
            'rowsPerPage' => 100,
            'columnFields' => [
                'id',
                [
                    'attribute' => 'name',
                    'label' => 'Имя',
                ],
                [
                    'attribute' => 'city_id',
                    'label' => 'Город',
                    'value' => function ($post) {
                        /* @var $post Post */
                        return $post->city->city . ' ' . $post->city->id;
                    }
                ],
                [
                    'attribute' => 'publication_status',
                    'label' => 'Статус(0,1,3)',
                    'format' => 'html',
                    'value' => function ($row) {
                        /* @var $row Post */

                        if ($row->publication_status == \App\Models\Post::POST_DONT_PUBLICATION) return 'Не публикуется';

                        if ($row->publication_status == \App\Models\Post::POST_ON_PUBLICATION) return 'Публикуется';

                        if ($row->publication_status == \App\Models\Post::POST_ON_MODERATION)
                            return '<div class="check"
                                 data-url="/admin/posts/check"
                                 onclick="check(this)" data-id="' . $row->id . '">
                            Подтвердить
                            </div>';

                    }
                ],
                [
                    'label' => 'avatar',
                    'format' => 'html',
                    'value' => function ($row) {
                        /* @var $row Post */
                        return '<img loading="lazy" src="/300-300/thumbs/' . $row->avatar->file . '" alt="">';

                    },
                ],
                [
                    'attribute' => 'phone_view_count',
                    'label' => 'Прсм. телефона',
                ],
                [
                    'attribute' => 'user_id',
                    'label' => 'id юзера',
                ],

                [
                    'label' => 'Удалить',
                    'format' => 'html',
                    'value' => function ($row) {
                        /* @var $row Post */
                        return '<div data-id="'.$row->id.'" onclick="deletePost(this)" class="delete">Удалить</div>';

                    },
                ],
            ]
        ];

        return view('admin.posts.index', compact('request', 'dataProvider', 'gridData'));
    }

    public function check(Request $request)
    {

        $post = Post::findOrFail($request->post('id'));

        $post->publication_status = Post::POST_ON_PUBLICATION;
        $post->save();

    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $serviceList = $this->dataRepository->service();
        $metroList = Metro::all();
        $rayonList = Rayon::all();

        $timeList = $this->dataRepository->time();
        $placeList = $this->dataRepository->place();
        $nationalList = $this->dataRepository->national();
        $hairColorList = $this->dataRepository->hairColor();
        $intimHairList = $this->dataRepository->intimHair();

        $tarifList = $this->dataRepository->tarif();

        $post = $this->postRepository->getById($id);

        return view('admin.posts.edit', compact('post', 'serviceList', 'metroList', 'rayonList',
            'timeList', 'placeList', 'nationalList', 'hairColorList', 'intimHairList', 'tarifList'));

    }

    public function update(Request $request, $id)
    {

        $post = Post::findOrFail($id);

        $data = $request->post();

        if ($post->update($data)) {

            return redirect('/admin/posts')
                ->with(['success' => 'Запись сохранена']);

        }

        return back()
            ->withErrors(['msg' => 'Ошибка'])
            ->withInput();
    }

    public function destroy($id)
    {
    }

    public function delete(Request $request)
    {
        $id = $request->post('id');

        $post = Post::where(['id' => $id])->with('files')->first();

        if ($post){

            foreach ($post->files as $item){

                $path = (storage_path('app/public'.$item->file));

                if (is_file($path)){

                    unlink($path);

                    $item->delete();

                }

            }

            \DB::table('post_times')->where('posts_id', $post->id)->delete();
            \DB::table('post_rayons')->where('posts_id', $post->id)->delete();
            \DB::table('post_metros')->where('posts_id', $post->id)->delete();
            \DB::table('post_services')->where('posts_id', $post->id)->delete();
            \DB::table('post_intim_hairs')->where('posts_id', $post->id)->delete();
            \DB::table('post_hair_colors')->where('posts_id', $post->id)->delete();
            \DB::table('post_nationals')->where('post_nationals_id', $post->id)->delete();

            $post->delete();

        }

    }

}
