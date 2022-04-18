<?php

namespace App\Repositories;

use App\Models\Post;

class PostsRepository
{
    public function getPostsForMainPage($limit, $cityId)
    {

        $columns = ['url', 'name', 'phone', 'price', 'id'];

        return Post::with('avatar')->select($columns)
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
            ->where(['city_id' => $cityId])
            ->whereNotIn('id', $ids)
            ->first();

        return $post;
    }

}
