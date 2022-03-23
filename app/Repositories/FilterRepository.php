<?php

namespace App\Repositories;

use App\Models\Age;
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

        $posts = array();

        if ($params->type == 'custom'){

            if ($params->parent_class == Age::class){

                $posts = Post::with('avatar')->where(['city_id' => $cityInfo['id']]);

                switch ($params->filter_url) {
                    case "ot-18-do-20-let":
                        $posts = $posts->where('age', '>', 17);
                        $posts = $posts->where('age', '<', 21);
                        break;

                    case "ot-21-do-25-let":
                        $posts = $posts->where('age', '>', 20);
                        $posts = $posts->where('age', '<', 26);
                        break;

                    case "ot-26-do-30-let":
                        $posts = $posts->where('age', '>', 25);
                        $posts = $posts->where('age', '<', 31);
                        break;

                    case "ot-31-do-35-let":
                        $posts = $posts->where('age', '>', 30);
                        $posts = $posts->where('age', '<', 46);
                        break;

                    case "ot-36-do-40-let":
                        $posts = $posts->where('age', '>', 35);
                        $posts = $posts->where('age', '<', 41);
                        break;

                    case "ot-40-do-50-let":
                        $posts = $posts->where('age', '>', 39);
                        $posts = $posts->where('age', '<', 51);
                        break;

                    case "ot-50-do-75-let":
                        $posts = $posts->where('age', '>', 50);
                        break;

                }

                return $posts->select($columns)->paginate($limit);

            }

        }else{

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

        }

        return $posts;

    }
}
