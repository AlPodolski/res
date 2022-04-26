<?php

namespace App\Repositories;

use App\Models\YandexTag;

class YandexRepository
{
    public function getTag($cityId)
    {

        if ($value = \Cache::get('yandex_tag_'.$cityId)) return $value;

        else{

            $value = YandexTag::where(['city_id' => $cityId])->select('tag')->get()->first();

            \Cache::set('yandex_tag_'.$cityId, $value);

        }

        return $value;

    }
}
