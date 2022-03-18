<?php

use Illuminate\Database\Seeder;

class PostIntimHairSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = \App\Models\Post::select('id')->get();

        $dataList = \App\Models\IntimHair::select('id')->get()->values()->all();

        $data = array();

        foreach ($posts as $post){

            $data[] = [
                'posts_id' => $post->id,
                'intim_hair_id' => $dataList[array_rand($dataList)]->id,
                'city_id' => 1
            ];

        }

        DB::table('post_intim_hairs')->insert($data);
    }
}
