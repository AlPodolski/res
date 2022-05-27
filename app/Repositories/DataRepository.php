<?php

namespace App\Repositories;

use App\Models\Age;
use App\Models\HairColor;
use App\Models\IntimHair;
use App\Models\National;
use App\Models\Place;
use App\Models\Price;
use App\Models\Rayon;
use App\Models\Service;
use App\Models\Time;
use Cache;
use App\Models\Metro;
use Carbon\Carbon;
use App\Models\Filter;

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

    public function all($cityId)
    {

        $expire = Carbon::now()->addMinutes(1000);

        $result['metro'] = Cache::remember('metro_city_id_' . $cityId, $expire, function () use ($cityId) {

            return Filter::with('metro')
                ->where(['parent_class' => Metro::class, 'city_id' => $cityId])
                ->get();

        });

        $result['rayon'] = Cache::remember('rayon_city_id_' . $cityId, $expire, function () use ($cityId) {

            return Filter::with('rayon')
                ->where(['parent_class' => Rayon::class, 'city_id' => $cityId])
                ->get();

        });

        $result['time'] = Cache::remember('time_cache', $expire, function () {

            return Filter::with('time')
                ->where(['parent_class' => Time::class])
                ->get();

        });

        $result['place'] = Cache::remember('place_cache', $expire, function () {

            return Filter::with('place')
                ->where(['parent_class' => Place::class])
                ->get();

        });

        $result['national'] = Cache::remember('national_cache', $expire, function () {

            return Filter::with('national')
                ->where(['parent_class' => National::class])
                ->get();

        });

        $result['hairColor'] = Cache::remember('hairColor_cache', $expire, function () {

            return Filter::with('hairColor')
                ->where(['parent_class' => HairColor::class])
                ->get();

        });

        $result['intimHair'] = Cache::remember('intimHair_cache', $expire, function () {

            return Filter::with('intimHair')
                ->where(['parent_class' => IntimHair::class])
                ->get();

        });

        $result['age'] = Cache::remember('age_cache', $expire, function () {

            return Filter::with('age')
                ->where(['parent_class' => Age::class])
                ->get();

        });

        $result['price'] = Cache::remember('price_cache', $expire, function () {

            return Filter::with('price')
                ->where(['parent_class' => Price::class])
                ->get();

        });

        $result['service'] = Cache::remember('service_cache', $expire, function () {

            return Filter::with('service')
                ->where(['parent_class' => Service::class])
                ->get();

        });

        return $result;

    }
}
