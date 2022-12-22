<?php

namespace App\Services;

use App\Models\Post;

class SingleMetaService
{
    public function makeMetaTags(Post $post, $cityInfo): array
    {
        $data['title'] = $this->makeTitle($post, $cityInfo);
        $data['des'] = $this->makeDes($post, $cityInfo);

        return $data;
    }

    private function makeTitle(Post $post, $cityInfo): string
    {

        $title = 'Проститутка '.$post->name;

        if ($post->metro->count()) $title .= ' у метро '.$post->metro->first()->metro->value;
        $title .= ' '.$cityInfo['city3'] . ' '.$post->phone . ' цена от '.$post->price .' ID '.$post->id;

        return $title;

    }

    private function makeDes(Post $post, $cityInfo): string
    {

        if (mb_strlen($post->about) > 200) $des = mb_substr($post->about, 0, 200). ' ID '.$post->id;

        else{

            $des = 'Проститутка '.$post->name . ' '.$cityInfo['city3'] .' номер телефона '.$post->phone;
            $des .= ' лучшие проститутки '.$cityInfo['city3'].' ID анкеты'.' '.$post->id;

        }

        return $des;

    }

}
