<?php

use Illuminate\Database\Seeder;

class UserNationalSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = \App\Models\Post::select('id')->get();
        $nationals = \App\Models\National::select('id')->get()->values()->all();

        $data = array();

        foreach ($posts as $post){

            $data[] = [
                'nationals_id' => $nationals[array_rand($nationals)]->id,
                'post_nationals_id' => $post->id,
                'city_id' => 1
            ];

        }

        DB::table('post_nationals')->insert($data);

    }
}
