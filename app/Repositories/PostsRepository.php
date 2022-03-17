<?php

namespace App\Repositories;

use App\Models\Post;

class PostsRepository
{
    public function getPostsForMainPage($limit)
    {

        $columns = ['url', 'name', 'phone', 'price'];

        return Post::select($columns)->paginate($limit);
    }

    public function getPostForSingle($url)
    {
        $columns = ['url', 'name', 'phone', 'price', 'age', 'breast_size', 'ves', 'about'];

        return Post::select($columns)->where(['url' => $url])->first();
    }

}
