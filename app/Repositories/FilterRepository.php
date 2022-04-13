<?php

namespace App\Repositories;

use App\Models\Age;
use App\Models\Filter;
use App\Models\Post;
use App\Models\Price;
use Carbon\Carbon;
use Cache;

class FilterRepository
{

    private $columns = ['url', 'name', 'phone', 'price', 'id'];

    public function getFilterParams($search)
    {


        $expire = Carbon::now()->addMinutes(1000);

        $data = Cache::remember('filter_url_cache_'.$search, $expire, function() use ($search) {

            return  Filter::where(['filter_url' => $search])->first();

        });

        return $data;
    }

    public function getForFilter($params, $limit, $cityInfo)
    {

        $columns = $this->columns;

        $posts = array();

        if ($params->type == 'custom') {

            $posts = Post::with('avatar')->where(['city_id' => $cityInfo['id']]);

            if ($params->parent_class == Price::class) {

                switch ($params->filter_url) {

                    case "do-1500-rub":
                        $posts = $posts->where('price', '<=', 1500);
                        break;

                    case "ot-1500-do-2000-rub":
                        $posts = $posts->where('price', '>', 1500);
                        $posts = $posts->where('price', '<=', 2000);
                        break;

                    case "ot-2000-do-3000-rub":
                        $posts = $posts->where('price', '>', 2000);
                        $posts = $posts->where('price', '<=', 3000);
                        break;

                    case "ot-3000-do-6000-rub":
                        $posts = $posts->where('price', '>', 3000);
                        $posts = $posts->where('price', '<=', 6000);
                        break;

                    case "ot-6000-rub":
                        $posts = $posts->where('price', '>', 6000);
                        break;

                }

            }

            if ($params->parent_class == Age::class) {

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

            }

            return $posts->select($columns)->paginate($limit);

        } else {

            $ids = $params->related_class::where([$params->related_param => $params->related_id, 'city_id' => $cityInfo['id']])
                ->select($params->search_param)
                ->get()
                ->values()
                ->toArray();

            $resultIds = array();

            if ($ids) foreach ($ids as $id) {
                $resultIds[] = $id[$params->search_param];
            }

            $posts = Post::with('avatar')->whereIn('id', $resultIds)->select($columns)->paginate($limit);

        }

        return $posts;

    }

    public function getMorePosts($city_id, $limit = 8)
    {

        $expire = Carbon::now()->addMinutes(60);

        $data = Cache::remember('more_posts_'.$city_id, $expire, function() use ($city_id, $limit) {

            return  Post::with('avatar')
                ->orderByRaw(\DB::raw('RAND()'))
                ->select($this->columns)
                ->limit($limit)
                ->where(['city_id' => $city_id])
                ->get();;

        });

        return $data;

    }
}
