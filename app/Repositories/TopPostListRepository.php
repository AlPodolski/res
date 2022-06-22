<?php

namespace App\Repositories;

use App\Models\Post;
use App\Models\TopList;
use Carbon\Carbon;
use Cache;

class TopPostListRepository
{
    public function getTopList($cityId, $limit)
    {

        $expire = Carbon::now()->addMinutes(10);

        $data = Cache::remember('top_list_cache_city_'.$cityId.'_limit_'.$limit, $expire, function() use ($cityId, $limit) {

            $topListIds = TopList::with('post:id,url')->select('post_id,id')
                ->where(['city_id' => $cityId])->limit(15)->orderByDesc('id')->get();

            return $topListIds;

        });

        return $data;


    }
}
