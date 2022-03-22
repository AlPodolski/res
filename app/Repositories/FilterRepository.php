<?php

namespace App\Repositories;

use App\Models\Filter;
use App\Models\Post;

class FilterRepository
{

    public function getFilterParams($search)
    {
        return Filter::where(['filter_url' => $search])->first();
    }

    public function getForFilter($params, $limit, $cityInfo)
    {

        $columns = ['url', 'name', 'phone', 'price', 'id'];

        $ids = $params->related_class::where([$params->related_param => $params->related_id, 'city_id' => $cityInfo['id']])
            ->select($params->search_param)
            ->get()
            ->values()
            ->toArray();

        $resultIds = array();

        if ($ids) foreach ($ids as $id){
            $resultIds[] = $id[$params->search_param];
        }

        $posts = Post::with('avatar')->whereIn('id' , $resultIds)->select($columns)->paginate($limit);

        return $posts;

    }
}
