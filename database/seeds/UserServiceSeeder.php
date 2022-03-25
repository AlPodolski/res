<?php

use Illuminate\Database\Seeder;

class UserServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = \App\Models\Post::select('id')->get();
        $nationals = \App\Models\Service::select('id')->get()->values()->all();

        $data = array();

        foreach ($posts as $post){

            $i = 0;

            while($i < 15){

                $i++;

                $data[] = [
                    'service_id' => $nationals[array_rand($nationals)]->id,
                    'posts_id' => $post->id,
                    'city_id' => 1
                ];

            }

        }

        DB::table('post_services')->insert($data);
    }
}
