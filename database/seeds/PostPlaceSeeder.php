<?php

use Illuminate\Database\Seeder;

class PostPlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = \App\Models\Post::select('id')->get();

        $dataList = \App\Models\Place::select('id')->get()->values()->all();

        $data = array();

        foreach ($posts as $post){

            $data[] = [
                'post_id' => $post->id,
                'place_id' => $dataList[array_rand($dataList)]->id,
                'city_id' => 1
            ];
            $data[] = [
                'post_id' => $post->id,
                'place_id' => $dataList[array_rand($dataList)]->id,
                'city_id' => 1
            ];

            $data[] = [
                'post_id' => $post->id,
                'place_id' => $dataList[array_rand($dataList)]->id,
                'city_id' => 1
            ];

        }

        DB::table('post_places')->insert($data);
    }
}
