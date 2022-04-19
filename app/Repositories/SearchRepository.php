<?php

namespace App\Repositories;
use App\Models\Post;

class SearchRepository
{
    public function getForSearch($search, $cityId, $limit = 15)
    {
        $columns = ['url', 'name', 'phone', 'price', 'id'];

        return Post::with('avatar')
            ->orderByRaw('RAND()')
            ->select($columns)
            ->where('name' , 'like', '%'.$search.'%')
            ->orWhere('phone' , 'like', '%'.$search.'%')
            ->where(['city_id' => $cityId])
            ->paginate($limit);
    }
}
