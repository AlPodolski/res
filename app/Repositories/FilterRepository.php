<?php

namespace App\Repositories;

use App\Actions\GetSort;
use App\Models\Age;
use App\Models\Comment;
use App\Models\Files;
use App\Models\Filter;
use App\Models\Post;
use App\Models\Price;
use Carbon\Carbon;
use Cache;

class FilterRepository
{

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

        $new = false;
        $trans = false;

        $posts = Post::with('avatar' ,'video', 'metro')
            ->where(['city_id' => $cityInfo['id']]);

        foreach ($searchParams as $params) {

            if ($params->short_name == 'video'){

                $posts = $posts->whereRaw(' id IN (select `related_id` from `files` where `type` =  ? ) ',
                    [Files::VIDEO_TYPE]);

            }

            if ($params->short_name == 'metro'){

                $posts = $posts->whereRaw(' id IN (select `posts_id` from `post_metros` where ' . $params->related_param . ' =  ?  and `city_id` = ?) ',
                    [$params->related_id, $cityInfo['id']]);

            }

            if ($params->short_name == 'rayon'){

                $posts = $posts->whereRaw(' id IN (select `posts_id` from `post_rayons` where ' . $params->related_param . ' =  ?  and `city_id` = ?) ',
                    [$params->related_id, $cityInfo['id']]);

            }

            if ($params->short_name == 'service'){

                $posts = $posts->whereRaw(' id IN (select `posts_id` from `post_services` where ' . $params->related_param . ' =  ?  and `city_id` = ?) ',
                    [$params->related_id, $cityInfo['id']]);

            }

            if ($params->short_name == 'time'){

                $posts = $posts->whereRaw(' id IN (select `posts_id` from `post_times` where ' . $params->related_param . ' =  ?  and `city_id` = ?) ',
                    [$params->related_id, $cityInfo['id']]);

            }

            if ($params->short_name == 'place'){

                $posts = $posts->whereRaw(' id IN (select `post_id` from `post_places` where ' . $params->related_param . ' =  ?  and `city_id` = ?) ',
                    [$params->related_id, $cityInfo['id']]);

            }

            if ($params->short_name == 'national'){

                $posts = $posts->whereRaw(' id IN (select `post_nationals_id` from `post_nationals` where ' . $params->related_param . ' =  ?  and `city_id` = ?) ',
                    [$params->related_id, $cityInfo['id']]);

            }

            if ($params->short_name == 'hair'){

                $posts = $posts->whereRaw(' id IN (select `posts_id` from `post_hair_colors` where ' . $params->related_param . ' =  ?  and `city_id` = ?) ',
                    [$params->related_id, $cityInfo['id']]);

            }
            if ($params->short_name == 'intimhair'){

                $posts = $posts->whereRaw(' id IN (select `posts_id` from `post_intim_hairs` where ' . $params->related_param . ' =  ?  and `city_id` = ?) ',
                    [$params->related_id, $cityInfo['id']]);

            }

            elseif ($params->short_name == 'trans'){

                $trans = true;

            }

            elseif ($params->short_name == 'review'){

                $posts = $posts->whereRaw(' id IN (select `related_id` from `comments` where `status` =  ? ) ',
                    [Comment::PUBLICATION_STATUS]);

            }

            elseif ($params->type == 'custom') {

                if ($params->short_name == 'check'){

                    $posts = $posts->where(['check_photo_status' => Post::PHOTO_CHECK_STATUS]);

                }

                if ($params->short_name == 'new'){

                    $new = true;

                }

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


            }

        }

        if ($new) $posts = $posts->orderByRaw('id DESC');
        else $posts = $posts->orderByRaw($sort);

        if ($trans) $posts = $posts->where(['pol' => Post::POL_TRANS]);
        else $posts = $posts->where(['pol' => Post::POL_WOMAN]);

        $posts = $posts->where(['publication_status' => Post::POST_ON_PUBLICATION])
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
                ->limit($limit)
                ->where(['city_id' => $city_id])
                ->get();

        });

        return $data;

    }
}
