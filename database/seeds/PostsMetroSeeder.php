<?php

use Illuminate\Database\Seeder;

class PostsMetroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = \App\Models\Post::select('id')->get();

        $metroList = \App\Models\Metro::select('id')->get()->values()->all();

        $data = array();

        foreach ($posts as $post){

            $data[] = [
                'metros_id' => $metroList[array_rand($metroList)]->id,
                'posts_id' => $post->id,
                'city_id' => 1
            ];
            $data[] = [
                'metros_id' => $metroList[array_rand($metroList)]->id,
                'posts_id' => $post->id,
                'city_id' => 1
            ];

        }

        DB::table('post_metros')->insert($data);

    }
}
