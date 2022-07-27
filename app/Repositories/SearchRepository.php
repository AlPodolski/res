<?php

namespace App\Repositories;

use App\Models\Post;
use App\Models\PostMetro;
use Illuminate\Http\Request;

class SearchRepository
{

    private $columns = ['url', 'name', 'phone', 'price', 'id' , 'age', 'breast_size', 'rost', 'ves'];

    public function getForSearch($search, $cityId, $limit = 15)
    {

        return Post::with('avatar', 'video', 'metro')
            ->orderByRaw('RAND()')
            ->select($this->columns)
            ->where('name' , 'like', '%'.$search.'%')
            ->orWhere('phone' , 'like', '%'.$search.'%')
            ->where(['city_id' => $cityId])
            ->paginate($limit);
    }

    public function getForFilter($data, $cityId, $limit = 15)
    {

        $posts = Post::with('avatar', 'video')
            ->orderByRaw('RAND()')
            ->select($this->columns)
            ->where('age' , '>=', $data['age-from'])
            ->where('age' , '<=', $data['age-to'])
            ->where('rost' , '>=', $data['rost-from'])
            ->where('rost' , '<=', $data['rost-to'])
            ->where('ves' , '>=', $data['ves-from'])
            ->where('ves' , '<=', $data['ves-to'])
            ->where('breast_size' , '>=', $data['grud-from'])
            ->where('breast_size' , '<=', $data['grud-to'])
            ->where('price' , '>=', $data['price-1-from'])
            ->where('price' , '<=', $data['price-1-to'])
            ->where(['city_id' => $cityId]);

        if ($data['metro']){

            $postsIds = PostMetro::where(['metros_id' => $data['metro']])->select('posts_id')->get();

            $result = array();

            if ($postsIds) foreach ($postsIds as $id){

                $result[] = $id['posts_id'];

            }

            $posts = $posts->whereIn('id', $result);

        }


        $posts = $posts->paginate($limit);

        return $posts;
    }

}
