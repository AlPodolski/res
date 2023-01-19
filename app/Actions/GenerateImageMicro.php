<?php

namespace App\Actions;

use App\Models\Post;

class GenerateImageMicro
{
    public function generate(Post $post, $city)
    {

        if (isset($post->avatar->file))

        $data =  [
            '@context' => 'https://schema.org',
            '@type' => 'ImageObject',
            'author' => $post->name,
            'contentUrl' => 'https://'.$_SERVER['HTTP_HOST'].$post->avatar->file,
            'contentLocation' => $city.' Россия',
            'datePublished' => $post->created_at,
            'name' => 'Проститутки '. $post->name,
        ];

        else $data = '';

        return json_encode($data);

    }
}
