<?php

use Illuminate\Database\Seeder;

class PostPhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = \App\Models\Post::select('id')->get();

        $dataList = array('/uploads/aaa/girl.jpg', '/uploads/aaa/nigga.jpg');

        $data = array();

        foreach ($posts as $post){

            $data[] = [
                'related_id' => $post->id,
                'related_class' => \App\Models\Post::class,
                'file' => $dataList[array_rand($dataList)],
                'type' => \App\Models\Files::MAIN_PHOTO_TYPE
            ];

            $i = 0;

            while ($i < 8){

                $i++;

                $data[] = [
                    'related_id' => $post->id,
                    'related_class' => \App\Models\Post::class,
                    'file' => $dataList[array_rand($dataList)],
                    'type' => \App\Models\Files::GALLERY_PHOTO_TYPE
                ];

            }

        }

        DB::table('files')->insert($data);
    }
}
