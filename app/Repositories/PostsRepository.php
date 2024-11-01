<?php

namespace App\Repositories;

use App\Actions\GetSort;
use App\Models\Post;
use App\Models\PostMetro;
use App\Models\PostRayon;
use Cookie;

class PostsRepository
{
    public function getPostsForMainPage($limit, $cityId, $sort): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {

        $sort = (new GetSort())->get($sort);

        return Post::with('video', 'metro')
            ->orderByRaw($sort)
            ->where(['city_id' => $cityId])
            ->where(['publication_status' => Post::POST_ON_PUBLICATION])
            ->where(['pol' => Post::POL_WOMAN])
            ->paginate($limit);
    }

    public function getPostForSingle($url, $cityId)
    {

        if ($post = \Cache::get('post_'.$url.'_'.$cityId)) return $post;

        else{

            $relation = ['national', 'hair', 'metro', 'rayon',
                'intimHair', 'time', 'place',
                'gallery', 'video', 'selphi', 'service', 'comments'];

            $post = Post::with($relation)
                ->where(['url' => $url, 'city_id' => $cityId])
                ->first();

            \Cache::set('post_'.$url.'_'.$cityId, $post);

        }

        return $post;

    }

    public function getView($notPostId = false)
    {
        if ($ids = Cookie::get('post_view')){

            $data = unserialize($ids);

            $posts = Post::with( 'video', 'metro')
                ->whereIn('id', $data);

            if ($notPostId) $posts->where('id', '<>', $notPostId);

            $posts = $posts->get();

            return $posts;

        }

        return false;

    }

    public function getMoreByRayonAndPrice(Post $post, $cityId , $sort,$limit = 8 )
    {

        $sort = (new GetSort())->get($sort);

        $columns = ['url', 'name', 'phone', 'price', 'id', 'sorting', 'city_id', 'likes', 'photo'];

        $posts = Post::with( 'video', 'metro')
            ->where('id', '<>', $post->id)
            ->orderByRaw($sort)
            ->select($columns)
            ->where(['publication_status' => Post::POST_ON_PUBLICATION])
            ->where(['city_id' => $cityId]);

        $posts = $posts->where('price', '>', $post->price - 500);
        $posts = $posts->where('price', '<=', $post->price + 500);


        $posts = $posts->limit($limit)->get();

        return $posts;

    }

    public function getPostForSingleMore($cityId ,$limit = 8, $ids = false, $price = false, $rayonId = false)
    {

        $relation = ['national', 'hair', 'metro', 'rayon',
            'intimHair', 'time', 'place',
            'gallery', 'video', 'selphi', 'service', 'comments'];

        $post = Post::with($relation)
            ->orderByRaw('RAND()')
            ->where(['publication_status' => Post::POST_ON_PUBLICATION])
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

        $post = $post->limit($limit)->get();

        return $post;
    }

    public function all($cityId)
    {
        $posts = Post::select('id', 'url', 'updated_at')
            ->where(['city_id' => $cityId])
            ->get();

        return $posts;
    }

    public function getByUserId($userId)
    {

        return Post::with( 'video','city')
            ->orderBy('id', 'desc')
            ->where(['user_id' => $userId])
            ->get();
    }

    public function getById($id)
    {
        $relation = ['national', 'hair', 'metro', 'rayon',
            'intimHair', 'time', 'place',
            'gallery', 'video', 'selphi', 'service', 'comments'];

        $post = Post::with($relation)
            ->where(['id' => $id])
            ->first();

        return $post;

    }

    public function getForMap($cityId)
    {
        $postsMetroIds = PostMetro::where(['city_id' => $cityId])
            ->with('posts', 'metro')
            ->get();

        $result = array();

        if ($postsMetroIds){

            foreach ($postsMetroIds as $item){

                if ($item->posts->first() and $item->metro->x) {

                    foreach ($item->posts as $postItem){

                        if (isset($postItem->photo)){

                            $data['id'] = $postItem->id;
                            $data['url'] = $postItem->url;
                            $data['x'] = $item->metro->x;
                            $data['y'] = $item->metro->y;
                            $data['price'] = $postItem->price;
                            $data['name'] = $postItem->name;
                            $data['phone'] = $postItem->phone;
                            $data['avatar'] = '/314-441/thumbs'.$postItem->photo;

                            $result[] = $data;

                        }

                    }

                }

            }

        }

        return $result;

    }

}
