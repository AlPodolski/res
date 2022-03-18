<?php

use Illuminate\Database\Seeder;

class PostsHairColorSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = \App\Models\Post::select('id')->get();

        $hairColorList = \App\Models\HairColor::select('id')->get()->values()->all();

        $data = array();

        foreach ($posts as $post){

            $data[] = [
                'posts_id' => $post->id,
                'city_id' => 1,
                'hair_colors_id' => $hairColorList[array_rand($hairColorList)]->id,
            ];

        }

        DB::table('post_hair_colors')->insert($data);

    }
}
