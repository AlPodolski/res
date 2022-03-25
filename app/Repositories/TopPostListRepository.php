<?php

namespace App\Repositories;

use App\Models\Post;

class TopPostListRepository
{
    public function getTopList($cityId, $limit)
    {
        $columns = ['url', 'id'];

        return Post::with('avatar')
            ->select($columns)
            ->where(['city_id' => $cityId])
            ->limit($limit)
            ->get();
    }
}
