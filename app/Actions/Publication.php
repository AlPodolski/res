<?php

namespace App\Actions;

use App\Events\PayEvent;
use App\Models\History;
use App\Models\Post;

class Publication
{
    public function publication(Post $post)
    {

        switch ($post->publication_status) {

            case Post::POST_DONT_PUBLICATION:

                if ($post->user->cash >= $post->tarif->price) {

                    $post->publication_status = Post::POST_ON_PUBLICATION;

                    if ($post->pay_time <= time()) {

                        $post->user->cash = $post->user->cash - $post->tarif->price;

                        $post->user->save();

                        $post->pay_time = time() + 3600;

                        $payType = History::PAY_FOR_POST_PUBLICATION_TYPE;

                        event(new PayEvent($post->tarif->price, $post->user->id, $payType, $post->user->cash));

                    }

                    $post->save();

                }

                break;

            case Post::POST_ON_PUBLICATION:
                $post->publication_status = Post::POST_DONT_PUBLICATION;
                break;
        }

        $post->save();

        return $post->getPublication();
    }
}
