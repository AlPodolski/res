<?php

namespace App\Actions;

use App\Models\Post;

class GenerateImageMicro
{
    public function generate(Post $post, $city)
    {
        $data =  [
            '@context' => 'https://schema.org',
            '@type' => 'ImageObject',
            'author' => $post->name,
            'contentUrl' => 'https://'.$_SERVER['HTTP_HOST'].$post->avatar->file,
            'contentLocation' => $city.' Россия',
            'datePublished' => $post->created_at,
            'name' => 'Проститутки '. $post->name,
        ];

        return json_encode($data);

    }
}
