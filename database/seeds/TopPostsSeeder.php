<?php

use Illuminate\Database\Seeder;

class TopPostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = \App\Models\Post::select('id')->limit(25)->get();

        $data = array();

        foreach ($posts as $post){

            $data[] = [
                'post_id' => $post->id,
                'city_id' => 1
            ];

            DB::table('top_lists')->insert($data);

        }

    }
}
