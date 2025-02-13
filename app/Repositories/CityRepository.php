<?php

namespace App\Repositories;

use App\Models\City;
use Carbon\Carbon;
use Cache;

class CityRepository
{
    public function getCityInfoByUrl($url)
    {

        if ($value = \Cache::get('city_'.$url)) return $value;

        else{

            $value = City::where(['url' => $url])->get()->first()->toArray();

            \Cache::set('city_'.$url, $value);

            return $value;

        }

    }

    /**
     * @param $id
     * @return array
     */
    public function getAllCityInfoById($id)
    {

        $expire = Carbon::now()->addMinutes(1000);

        $data = Cache::remember('city_id_'.$id, $expire, function() use ($id) {

            return  City::where(['id' => $id])->get()->first()->toArray();

        });

        return $data;
    }

    public function getAllCity()
    {
        return City::all();
    }

}
