<?php

namespace App\Http\Controllers;

use App\Actions\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function index(Request $request)
    {
        $postId = $request->post('id');
        $type = $request->post('type');

        $post = Post::where('id', $postId)->first();

        if ($post){

            if ($type == 'like'){
                $post->likes = $post->likes + 1;
                Like::add($post->id, 'liked');
                Like::remove($post->id, 'disliked');
            }else{
                $post->likes = $post->likes - 1;
                Like::add($post->id, 'disliked');
                Like::remove($post->id, 'liked');
            }

            $post->save();

            return $post->likes;

        }

    }
}
