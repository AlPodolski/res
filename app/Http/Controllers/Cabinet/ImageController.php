<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{

    public function add(Request $request)
    {

        $request->validate([
            'id' => 'required|integer',
            'file' => 'required|file',
        ]);

        // Найти соответствующий пост
        $post = Post::whereId($request->id)->where('user_id', auth()->id())->first();

        // Если пост не найден
        if (!$post) {
            return response()->json([
                'error' => 'Post not found'
            ], 404);
        }

        $dir = \substr(\md5($post->url), 0, 3);

        $avatar = $request->file('file');

        // Удалить старый аватар, если он есть
        if ($avatar) {

            \Cache::delete('post_' . $post->url.'_'.$post->city_id);

            $avatar = $avatar->store('/uploads/' . $dir, 'public');

            $path = (storage_path('app/public/' . $post->photo));

            if (file_exists($path)) {

                unlink($path);

            }

            $post->photo = '/' .$avatar;

            $post->save();

        }

        return '/storage/'.$post->photo;
    }

    public function addMany(Request $request)
    {

        $avatar = $request->file('file');

        $ids = explode(',' , $request->ids);

        $dir = \substr(\md5($avatar), 0, 3);

        $avatar = $avatar->store('/uploads/' . $dir, 'public');

        $posts = Post::whereIn('id', $ids)
            ->where('user_id', auth()->id() )->get();

        foreach ($posts as $post){

            \Cache::delete('post_' . $post->url.'_'.$post->city_id);

            $path = (storage_path('app/public/' . $post->photo));

            if (file_exists($path)) {

                unlink($path);

            }

            $post->photo = '/' .$avatar;

            $post->save();

        }

        return '/storage/'.$avatar;

    }

}
