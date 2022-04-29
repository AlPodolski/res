<?php

namespace App\Repositories;

use App\Models\Meta;
use Cache;
use Carbon\Carbon;

class MetaRepository
{

    private $cityRepository;

    public function __construct()
    {
        $this->cityRepository = new CityRepository();
    }

    public function getForMain($url, $cityId)
    {

        if ($value = \Cache::get('meta_'.$url.'_'.$cityId)) return $value;

        else{

            $meta = Meta::where(['url' => $url])->select('title', 'des', 'h1')->get()->first()->toArray();

            $value = $this->replaceCity($meta, $cityId);

            \Cache::set('meta_'.$url.'_'.$cityId, $value);

        }

        return $value;

    }

    public function getForFilter($url, $cityId, $filterParams)
    {

        if ($value = \Cache::get('meta_'.$url.'_'.$cityId)) return $value;

        else{

            if ($meta = Meta::where(['url' => $url])->select('title', 'des', 'h1')->get()->first()) {

                $meta = $meta->toArray();

                return $this->replaceCity($meta, $cityId);

            } elseif (count($filterParams) == 1 and $meta = Meta::where(['url' => $filterParams[0]->short_name])->select('title', 'des', 'h1')->get()->first()) {

                $meta = $meta->toArray();

                $result = $this->replaceParams($meta, $filterParams);

                $value = $this->replaceCity($result, $cityId);

            } else {

                $meta = Meta::where(['url' => 'default'])->select('title', 'des', 'h1')->get()->first();

                $meta = $meta->toArray();

                $result = $this->replaceParams($meta, $filterParams);

                $value = $this->clean($this->replaceCity($result, $cityId));

            }

            \Cache::set('meta_'.$url.'_'.$cityId, $value);

        }

        return $value;

    }

    public function replaceParams($meta, $filterParamsList)
    {

        foreach ($meta as &$metaItem) {

            $pattern = '#:[a-z-A-Z-0-9]+#';

            if (preg_match_all($pattern, $metaItem, $marches)) {

                foreach ($marches[0] as $param) {

                    $findValue = str_replace(':', '', $param);

                    foreach ($filterParamsList as $filterParams){

                        if (strstr($findValue, $filterParams->short_name)) {

                            $expire = Carbon::now()->addMinutes(1000);

                            $replaceData = Cache::remember($filterParams->parent_class.'_'.$filterParams->related_id, $expire, function() use ($filterParams) {

                                return $filterParams->parent_class::where(['id' => $filterParams->related_id])
                                    ->get()->first()->toArray();

                            });


                            $replace = 'value' . str_replace($filterParams->short_name, '', $findValue);

                            $metaItem = $this->replaceOne($param, $replaceData[$replace], $metaItem);

                            $pattern = "#\[[^:.]+\]#i";

                            if (preg_match($pattern, $metaItem, $m)) {

                                $m[0] = str_replace('[', '', $m[0]);
                                $m[0] = str_replace(']', '', $m[0]);

                                $metaItem = preg_replace($pattern, $m[0] . ' [' . $param . '] ', $metaItem);

                            }

                        }

                    }

                }

            }

        }

        return $meta;

    }

    private function clean($meta)
    {

        foreach ($meta as &$metaItem){

            $metaItem = preg_replace('#\[.*?\]#', '', $metaItem);

        }

        return $meta;

    }

    private function replaceOne($search, $replace, $text)
    {

        $pos = strpos($text, $search);
        return $pos !== false ? substr_replace($text, $replace, $pos, strlen($search)) : $text;

    }

    private function replaceCity($meta, $cityId)
    {

        $result = array();

        $cityInfo = $this->cityRepository->getAllCityInfoById($cityId);

        foreach ($meta as $key => $metaItem) {

            $pattern = '#:[city0-9]+#';

            if (preg_match_all($pattern, $metaItem, $marches)) {

                foreach ($marches[0] as $param) {

                    if (strstr($param, 'city')){

                        $findValue = str_replace(':', '', $param);

                        $result[$key] = str_replace($param, $cityInfo[$findValue], $metaItem);

                    }else {

                        $result[$key] = $metaItem;

                    }

                }

            } else {

                $result[$key] = $metaItem;

            }

        }

        return $result;

    }

}
