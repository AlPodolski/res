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

        $post = Post::with('national', 'hair', 'metro', 'rayon', 'intimHair', 'time', 'place', 'avatar', 'gallery', 'video')
            ->select($columns)
            ->where(['url' => $url])
            ->first();

        return $post;
    }

}
