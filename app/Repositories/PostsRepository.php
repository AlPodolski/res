<?php

namespace App\Repositories;

use App\Models\Post;

class PostsRepository
{
    public function getPostsForMainPage($limit, $cityId)
    {

        $columns = ['url', 'name', 'phone', 'price'];

        return Post::select($columns)->where(['city_id' => $cityId])->paginate($limit);
    }

    public function getPostForSingle($url)
    {
        $columns = ['url', 'id', 'name', 'phone', 'price', 'age', 'breast_size', 'ves', 'about'];

        $post = Post::with('national', 'hair', 'metro', 'rayon', 'intimHair', 'time', 'place')
            ->select($columns)
            ->where(['url' => $url])
            ->first();

        return $post;
    }

}
