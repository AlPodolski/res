<?php

namespace App\Console\Commands;

use App\Models\City;
use App\Models\Files;
use App\Models\HairColor;
use App\Models\IntimHair;
use App\Models\Metro;
use App\Models\National;
use App\Models\Place;
use App\Models\Post;
use App\Models\PostHairColor;
use App\Models\PostIntimHair;
use App\Models\PostMetro;
use App\Models\PostNational;
use App\Models\PostPlace;
use App\Models\PostRayon;
use App\Models\PostService;
use App\Models\PostTime;
use App\Models\Rayon;
use App\Models\Service;
use App\Models\Time;
use Illuminate\Console\Command;
use League\Csv\Reader;
use League\Csv\Statement;

class ImportPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $stream = \fopen(storage_path('import_18_01_2022.csv'), 'r');

        $csv = Reader::createFromStream($stream);
        $csv->setDelimiter(';');
        $csv->setHeaderOffset(0);
        //build a statement
        $stmt = (new Statement());

        $records = $stmt->process($csv);

        $price = array(1000, 1500, 2000, 3000, 5000, 6000, 7000, 10000);

        $serviceList = Service::all();
        $placeList = Place::all();
        $timeList = Time::all();

        $posts = array();

        foreach ($records as $record) {

            if ($record['name']) {

                $posts[] = $record;

            }
        }

        $i = 0;

        foreach ($posts as $record) {

            $city = City::where('url', $record['url'])->first();
            if (!$city) continue;
            $cityId = $city->id;

            $post = new Post();

            $post->name = $record['name'];
            $post->age = $record['age'];
            $post->phone = $record['phone'];
            $post->rost = $record['rost'];
            $post->ves = $record['weght'];
            $post->breast_size = $record['grud'];
            $post->about = htmlspecialchars(strip_tags($record['deskr']));
            $post->city_id = $cityId;
            $post->tarif_id = 1;
            $post->sorting = 10022;
            $post->check_photo_status = rand(0, 1);
            $post->price = $record['price'];
            $post->publication_status = 1;
            $post->pol = Post::POL_WOMAN;

            if ($post->save()) {

                $i++;

                if (isset($record['metro']) and $record['metro']) {

                    $dataList = explode(',', $record['metro']);

                    foreach ($dataList as $item) {

                        if ($temp = Metro::where(['value' => $item, 'city_id' => $cityId])->get()->first()) {

                            $postRelation = new PostMetro();
                            $postRelation->city_id = $cityId;
                            $postRelation->posts_id = $post->id;
                            $postRelation->metros_id = $temp->id;

                            $postRelation->save();

                        }

                    }

                }

                if ($record['mini']) {

                    $ava = $record['mini'];

                    $file = new Files();

                    $file->related_id = $post->id;
                    $file->related_class = Post::class;
                    $file->file = '/uploads/aa6/' . $ava;
                    $file->type = Files::MAIN_PHOTO_TYPE;

                    $file->save();

                }

                if ($record['gallery']) {

                    $dataList = explode(',', $record['gallery']);

                    foreach ($dataList as $item) {

                        $file = new Files();

                        $file->related_id = $post->id;
                        $file->related_class = Post::class;
                        $file->file = '/uploads/aa6/' . $item;
                        $file->type = Files::GALLERY_PHOTO_TYPE;

                        $file->save();

                    }

                }

                if (isset($record['selphi']) and $record['selphi']) {

                    $dataList = explode(',', $record['selphi']);

                    foreach ($dataList as $item) {

                        $file = new Files();

                        $file->related_id = $post->id;
                        $file->related_class = Post::class;
                        $file->file = '/uploads/aa6/' . $item;
                        $file->type = Files::SELPHI_TYPE;

                        $file->save();

                    }

                }

                if (isset($record['video']) and $record['video']) {

                    $file = new Files();

                    $file->related_id = $post->id;
                    $file->related_class = Post::class;
                    $file->file = '/uploads/aa6/' . $record['video'];
                    $file->type = Files::VIDEO_TYPE;

                    $file->save();


                }

                if (isset($record['intim']) and $record['intim']) {

                    if ($temp = IntimHair::where(['value' => $item])->get()->first()) {

                        $postRelation = new PostIntimHair();
                        $postRelation->city_id = $cityId;
                        $postRelation->posts_id = $post->id;
                        $postRelation->intim_hair_id = $temp->id;

                        $postRelation->save();

                    }

                }

                if ($record['hair']) {

                    if ($temp = HairColor::where(['value' => $item])->get()->first()) {

                        $postRelation = new PostHairColor();
                        $postRelation->city_id = $cityId;
                        $postRelation->posts_id = $post->id;
                        $postRelation->hair_colors_id = $temp->id;

                        $postRelation->save();

                    }

                }

                if (isset($record['rayon']) and $record['rayon']) {

                    if ($temp = Rayon::where(['value' => $item])->get()->first()) {

                        $postRelation = new PostRayon();
                        $postRelation->city_id = $cityId;
                        $postRelation->posts_id = $post->id;
                        $postRelation->rayons_id = $temp->id;

                        $postRelation->save();

                    }

                }

                if (isset($record['ethnik']) and $record['ethnik']) {

                    if ($temp = National::where(['value' => $record['ethnik']])->get()->first()) {

                        $postRelation = new PostNational();
                        $postRelation->city_id = $cityId;
                        $postRelation->post_nationals_id = $post->id;
                        $postRelation->nationals_id = $temp->id;

                        $postRelation->save();

                    }

                }

                foreach ($serviceList as $service) {

                    if (rand(0, 1)) {

                        $postService = new PostService();

                        $postService->posts_id = $post->id;
                        $postService->service_id = $service->id;
                        $postService->city_id = $cityId;

                        $postService->save();

                    }

                }

                foreach ($placeList as $item) {

                    if (rand(0, 1)) {

                        $postRelation = new PostPlace();
                        $postRelation->city_id = $cityId;
                        $postRelation->post_id = $post->id;
                        $postRelation->place_id = $item->id;

                        $postRelation->save();

                    }

                }

                foreach ($timeList as $item) {

                    if (rand(0, 1)) {

                        $postRelation = new PostTime();
                        $postRelation->city_id = $cityId;
                        $postRelation->posts_id = $post->id;
                        $postRelation->param_id = $item->id;

                        $postRelation->save();

                    }

                }

            }

            if ($i > 1) break;

        }


    }

}
