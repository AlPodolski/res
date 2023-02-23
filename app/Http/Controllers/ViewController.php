<?php

namespace App\Http\Controllers;

use App\Actions\AddView;
use App\Models\Post;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function phone(Request $request)
    {
        $cityId = $request->post('city');
        $postId = $request->post('id');

        if ($post = Post::where('id', $postId)->first()) {

            if ($post->fake) {
                (new AddView($post))->addViewPhone();
                return $post->phone;
            } else {

                $phone = Post::where('fake', Post::POST_REAL)
                    ->where('last_phone_view', '<=', (time() - 1000))
                    ->where('city_id', $cityId)
                    ->orderBy('last_phone_view', 'desc')
                    ->first();

                if ($phone) {

                    $phone->last_phone_view = time();
                    $phone->phone_view_count = $phone->phone_view_count + 1;

                    $phone->save();

                    return $phone->phone;

                } else return $post->phone;

            }

        }

    }
}
