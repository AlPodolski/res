<?php

namespace App\Console\Commands;

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


        $stream = \fopen(storage_path('rex_import_30_03_2022.csv'), 'r');

        $csv = Reader::createFromStream($stream);
        $csv->setDelimiter(';');
        $csv->setHeaderOffset(0);
        //build a statement
        $stmt = (new Statement());

        $records = $stmt->process($csv);

        $price = array(1000, 1500, 2000, 3000, 5000, 6000, 7000, 10000);

        $cityId = 1;

        $serviceList = Service::all();
        $placeList = Place::all();
        $timeList = Time::all();

        foreach ($records as $record) {

            if ($record['name']) {

                $post = new Post();

                $post->name = $record['name'];
                $post->age = is_int($record['age']) ? $record['age'] : null;
                $post->phone = $record['phone'];
                $post->rost = is_int($record['rost']) ? $record['rost'] : null;
                $post->ves = is_int($record['weght']) ? $record['weght'] : null;
                $post->breast_size = is_int($record['grud']) ? $record['grud'] : null;
                $post->about = strip_tags($record['deskr']);
                $post->city_id = $cityId;
                $post->tarif_id = 1;
                $post->price = $price[array_rand($price)];
                $post->publication_status = 1;

                if ($post->save()) {

                    if ($record['metro']) {

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

                    if ($record['gallery']) {

                        $dataList = explode(',', $record['gallery']);

                        $ava = array_shift($dataList);

                        if ($ava) {

                            $file = new Files();

                            $file->related_id = $post->id;
                            $file->related_class = Post::class;
                            $file->file = '/uploads/aaa/' . $ava;
                            $file->type = Files::MAIN_PHOTO_TYPE;

                            $file->save();

                        }

                        foreach ($dataList as $item) {

                            $file = new Files();

                            $file->related_id = $post->id;
                            $file->related_class = Post::class;
                            $file->file = '/uploads/aaa/' . $item;
                            $file->type = Files::GALLERY_PHOTO_TYPE;

                            $file->save();

                        }

                    }

                    if ($record['selfie']) {

                        $dataList = explode(',', $record['selfie']);

                        foreach ($dataList as $item) {

                            $file = new Files();

                            $file->related_id = $post->id;
                            $file->related_class = Post::class;
                            $file->file = '/uploads/aaa/' . $item;
                            $file->type = Files::SELPHI_TYPE;

                            $file->save();

                        }

                    }

                    if ($record['video']) {

                        $file = new Files();

                        $file->related_id = $post->id;
                        $file->related_class = Post::class;
                        $file->file = '/uploads/aaa/' . $record['video'];
                        $file->type = Files::VIDEO_TYPE;

                        $file->save();


                    }

                    if ($record['intim']) {

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

                    if ($record['rayon']) {

                        if ($temp = Rayon::where(['value' => $item])->get()->first()) {

                            $postRelation = new PostRayon();
                            $postRelation->city_id = $cityId;
                            $postRelation->posts_id = $post->id;
                            $postRelation->rayons_id = $temp->id;

                            $postRelation->save();

                        }

                    }

                    if ($record['ethnic']) {

                        if ($temp = National::where(['value' => $record['ethnic']])->get()->first()) {

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

                    dd($dataList);

                }

            }

        }


    }

}
