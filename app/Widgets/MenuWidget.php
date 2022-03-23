<?php

namespace App\Widgets;

use App\Models\Age;
use App\Models\Filter;
use App\Models\HairColor;
use App\Models\IntimHair;
use App\Models\Metro;
use App\Models\National;
use App\Models\Place;
use App\Models\Price;
use App\Models\Rayon;
use App\Models\Time;
use Illuminate\Http\Request;
use Klisl\Widgets\Contract\ContractWidget;

/**
 * Class MenuWidget
 * Класс для демонстрации работы расширения
 * @package App\Widgets
 */
class MenuWidget implements ContractWidget{

    public $city_id;

    public function __construct($data)
    {
        $this->city_id = $data['city_id'];
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	public function execute(){

        $metroList = Filter::with('metro')
            ->where(['parent_class' => Metro::class, 'city_id' => $this->city_id])
            ->get();

        $rayonList = Filter::with('rayon')
            ->where(['parent_class' => Rayon::class, 'city_id' => $this->city_id])
            ->get();

        $timeList = Filter::with('time')
            ->where(['parent_class' => Time::class])
            ->get();

        $placeList = Filter::with('place')
            ->where(['parent_class' => Place::class])
            ->get();

        $nationalList = Filter::with('national')
            ->where(['parent_class' => National::class])
            ->get();

        $hairColorList = Filter::with('hairColor')
            ->where(['parent_class' => HairColor::class])
            ->get();

        $intimHairList = Filter::with('intimHair')
            ->where(['parent_class' => IntimHair::class])
            ->get();

        $ageList = Filter::with('age')
            ->where(['parent_class' => Age::class])
            ->get();

        $priceList = Filter::with('price')
            ->where(['parent_class' => Price::class])
            ->get();

		return view('Widgets::test', compact(
            'metroList',
            'rayonList',
            'timeList',
            'placeList',
            'nationalList',
            'ageList',
            'priceList',
            'hairColorList',
            'intimHairList'));

	}
}
