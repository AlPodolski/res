<?php

namespace App\Repositories;

use Cache;
use App\Models\Metro;
use Carbon\Carbon;

class DataRepository
{
    public function metro($cityId)
    {

        $expire = Carbon::now()->addHours(1200);

        $metroList = Cache::remember('metro_ids_city_id_' . $cityId, $expire, function () use ($cityId) {

            return Metro::where(['city_id' => $cityId])->select('id', 'value')->get();

        });

        return $metroList;

    }
}
