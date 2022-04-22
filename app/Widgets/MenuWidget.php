<?php

namespace App\Widgets;

use App\Models\Age;
use App\Models\City;
use App\Models\Filter;
use App\Models\HairColor;
use App\Models\IntimHair;
use App\Models\Metro;
use App\Models\National;
use App\Models\Place;
use App\Models\Price;
use App\Models\Rayon;
use App\Models\Service;
use App\Models\Time;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Klisl\Widgets\Contract\ContractWidget;
use Cache;


/**
 * Class MenuWidget
 * Класс для демонстрации работы расширения
 * @package App\Widgets
 */
class MenuWidget implements ContractWidget
{

    public $city_id;

    public function __construct($data)
    {
        $this->city_id = $data['city_id'];
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function execute()
    {

        $expire = Carbon::now()->addMinutes(1000);

        $cityId = $this->city_id;

        $cityList = Cache::remember('city_list', $expire, function () use ($cityId) {

            return City::get();

        });
        $metroList = Cache::remember('metro_city_id_' . $this->city_id, $expire, function () use ($cityId) {

            return Filter::with('metro')
                ->where(['parent_class' => Metro::class, 'city_id' => $cityId])
                ->get();

        });

        $rayonList = Cache::remember('rayon_city_id_' . $this->city_id, $expire, function () use ($cityId) {

            return Filter::with('rayon')
                ->where(['parent_class' => Rayon::class, 'city_id' => $cityId])
                ->get();

        });

        $timeList = Cache::remember('time_cache', $expire, function () {

            return Filter::with('time')
                ->where(['parent_class' => Time::class])
                ->get();

        });

        $placeList = Cache::remember('place_cache', $expire, function () {

            return Filter::with('place')
                ->where(['parent_class' => Place::class])
                ->get();

        });

        $nationalList = Cache::remember('national_cache', $expire, function () {

            return Filter::with('national')
                ->where(['parent_class' => National::class])
                ->get();

        });

        $hairColorList = Cache::remember('hairColor_cache', $expire, function () {

            return Filter::with('hairColor')
                ->where(['parent_class' => HairColor::class])
                ->get();

        });

        $intimHairList = Cache::remember('intimHair_cache', $expire, function () {

            return Filter::with('intimHair')
                ->where(['parent_class' => IntimHair::class])
                ->get();

        });

        $ageList = Cache::remember('age_cache', $expire, function () {

            return Filter::with('age')
                ->where(['parent_class' => Age::class])
                ->get();

        });

        $priceList = Cache::remember('price_cache', $expire, function () {

            return Filter::with('price')
                ->where(['parent_class' => Price::class])
                ->get();

        });

        $serviceList = Cache::remember('service_cache', $expire, function () {

            return Filter::with('service')
                ->where(['parent_class' => Service::class])
                ->get();

        });

        return view('Widgets::test', compact(
            'metroList',
            'rayonList',
            'timeList',
            'placeList',
            'nationalList',
            'ageList',
            'priceList',
            'serviceList',
            'hairColorList',
            'cityList',
            'intimHairList'));

    }
}
