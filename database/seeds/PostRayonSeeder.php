<?php

use Illuminate\Database\Seeder;

class PostRayonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = \App\Models\Post::select('id')->get();

        $rayonList = \App\Models\Rayon::select('id')->get()->values()->all();

        $data = array();

        foreach ($posts as $post){

            $data[] = [
                'posts_id' => $post->id,
                'rayons_id' => $rayonList[array_rand($rayonList)]->id,
                'city_id' => 1
            ];

        }

        DB::table('post_rayons')->insert($data);

    }
}
