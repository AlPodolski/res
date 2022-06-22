<?php

namespace App\Repositories;

use App\Models\Post;
use Carbon\Carbon;
use Cache;

class TopPostListRepository
{
    public function getTopList($cityId, $limit)
    {

        $expire = Carbon::now()->addMinutes(10);

        $data = Cache::remember('top_list_cache_city_'.$cityId.'_limit_'.$limit, $expire, function() use ($cityId, $limit) {

            $columns = ['url', 'id'];

            return Post::with('avatar')
                ->select($columns)
                ->where(['city_id' => $cityId])
                ->limit($limit)
                ->orderByRaw('RAND()')
                ->get();

        });

        return $data;


    }
}
