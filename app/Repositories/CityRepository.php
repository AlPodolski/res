<?php

namespace App\Repositories;

use App\Models\City;

class CityRepository
{
    public function getCityInfoByUrl($url)
    {
        return City::select('id')->where(['url' => $url])->get()->first()->toArray();
    }

    public function getAllCityInfoById($id)
    {
        return City::where(['id' => $id])->get()->first()->toArray();
    }

}
