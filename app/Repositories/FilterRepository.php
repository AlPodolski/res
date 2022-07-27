<?php

namespace App\Repositories;

use App\Actions\GetSort;
use App\Models\Age;
use App\Models\Filter;
use App\Models\Post;
use App\Models\Price;
use Carbon\Carbon;
use Cache;

class FilterRepository
{

    private $columns = ['url', 'name', 'phone', 'price', 'id', 'age', 'breast_size', 'rost', 'ves'];

    public function getFilterParams($search)
    {

        $searchData = explode('/', $search);

        $expire = Carbon::now()->addMinutes(1000);

        foreach ($searchData as $searchItem) {

            $data[] = Cache::remember('filter_url_cache_' . $searchItem, $expire, function () use ($searchItem) {

                return Filter::where(['filter_url' => $searchItem])->first();

            });

        }

        return $data;
    }

    public function getForFilter($searchParams, $limit, $cityInfo, $sort)
    {

        $sort = (new GetSort())->get($sort);

        $columns = $this->columns;

        $resultIds = array();

        $posts = array();

        foreach ($searchParams as $params) {

            if ($params->type == 'custom') {

                $posts = Post::where(['city_id' => $cityInfo['id']]);

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

                        case "do-3000":
                            $posts = $posts->where('price', '<=', 3000);
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

                $ids = $posts->select('id')->get();

                $tempResult = array();

                if ($ids) foreach ($ids as $id) {
                    $tempResult[] = $id['id'];
                }

                $resultIds = $this->intersect_data( $tempResult, $resultIds);


            } else {

                $ids = $params->related_class::where([$params->related_param => $params->related_id, 'city_id' => $cityInfo['id']])
                    ->select($params->search_param)
                    ->get()
                    ->values()
                    ->toArray();

                $tempResult = array();

                if ($ids) foreach ($ids as $id) {
                    $tempResult[] = $id[$params->search_param];
                }

                $resultIds = $this->intersect_data( $tempResult, $resultIds);

            }

        }

        $posts = Post::with('avatar' ,'video', 'metro')
            ->orderByRaw($sort)
            ->whereIn('id', $resultIds)
            ->where(['publication_status' => Post::POST_ON_PUBLICATION])
            ->select($columns)
            ->paginate($limit);

        return $posts;

    }

    private function intersect_data($id, $ids)
    {

        if ($id) {

            if (!empty($ids)) {

                $ids = array_intersect($ids, $id);

            } else {

                $ids = $id;

            }

        }

        if (empty($ids)) {
            $ids = array(0);
        }

        return $ids;

    }

    public function getMorePosts($city_id, $limit = 8)
    {

        $expire = Carbon::now()->addMinutes(60);

        $data = Cache::remember('more_posts_' . $city_id, $expire, function () use ($city_id, $limit) {

            return Post::with('avatar', 'video')
                ->orderByRaw(\DB::raw('RAND()'))
                ->select($this->columns)
                ->limit($limit)
                ->where(['city_id' => $city_id])
                ->get();

        });

        return $data;

    }
}
