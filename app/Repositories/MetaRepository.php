<?php

namespace App\Repositories;

use App\Models\Meta;

class MetaRepository
{

    private $cityRepository;

    public function __construct()
    {
        $this->cityRepository = new CityRepository();
    }

    public function getForMain($url, $cityId)
    {
        $meta = Meta::where(['url' => $url])->select('title', 'des', 'h1')->get()->first()->toArray();

        return $this->replaceCity($meta, $cityId);

    }

    private function replaceCity($meta, $cityId)
    {

        $result = array();

        $cityInfo = $this->cityRepository->getAllCityInfoById($cityId);

        foreach ($meta as $key => $metaItem) {

            $pattern = '#:[a-z-A-Z-0-9]+#';

            if (preg_match_all($pattern, $metaItem, $marches)) {

                foreach ($marches[0] as $param) {

                    $findValue = str_replace(':', '', $param);

                    $result[$key] = str_replace($param, $cityInfo[$findValue], $metaItem);


                }

            }

        }

        return $result;

    }

}
