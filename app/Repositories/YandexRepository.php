<?php

namespace App\Repositories;

use App\Models\YandexTag;

class YandexRepository
{
    public function getTag($cityId)
    {
        return YandexTag::where(['city_id' => $cityId])->select('tag')->get()->first();
    }
}
