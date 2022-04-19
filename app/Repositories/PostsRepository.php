<?php

namespace App\Repositories;

use App\Models\Post;
use App\Models\PostRayon;

class PostsRepository
{
    public function getPostsForMainPage($limit, $cityId)
    {

        $columns = ['url', 'name', 'phone', 'price', 'id'];

        return Post::with('avatar')
            ->orderByRaw('RAND()')
            ->select($columns)
            ->where(['city_id' => $cityId])
            ->paginate($limit);
    }

    public function getPostForSingle($url, $cityId)
    {
        $columns = ['url', 'id', 'name', 'phone', 'price', 'age', 'breast_size', 'ves', 'about'];

        $relation = ['national', 'hair', 'metro', 'rayon',
            'intimHair', 'time', 'place', 'avatar',
            'gallery', 'video', 'selphi', 'service', 'comments'];

        $post = Post::with($relation)
            ->select($columns)
            ->where(['url' => $url, 'city_id' => $cityId])
            ->first();

        return $post;
    }

    public function getPostForSingleMore($cityId, $ids = false, $price = false, $rayonId = false)
    {
        $columns = ['url', 'id', 'name', 'phone', 'price', 'age', 'breast_size', 'ves', 'about'];

        $relation = ['national', 'hair', 'metro', 'rayon',
            'intimHair', 'time', 'place', 'avatar',
            'gallery', 'video', 'selphi', 'service', 'comments'];

        $post = Post::with($relation)
            ->select($columns)
            ->orderByRaw('RAND()')
            ->where(['city_id' => $cityId])
            ->whereNotIn('id', $ids);

        $resultIds = false;

        if ($rayonId){

            $postsId = PostRayon::where(['rayons_id' => $rayonId])
                ->whereNotIn('posts_id', $ids)
                ->select('posts_id')
                ->get();

            if ($postsId) foreach ($postsId as $id) {
                $resultIds[] = $id['posts_id'];
            }

            if ($resultIds) $post = $post->whereIn('id', $resultIds);

        }

        if ($price and !$resultIds){

            $post = $post->where('price', '>', $price - 500);
            $post = $post->where('price', '<=', $price + 500);

        }

        $post = $post->first();

        return $post;
    }

}
