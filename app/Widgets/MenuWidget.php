<?php

namespace App\Widgets;

use App\Models\Filter;
use App\Models\Metro;
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

		return view('Widgets::test', compact('metroList'));

	}
}
