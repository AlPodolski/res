<?php

namespace App\Actions;

use App\Models\Post;

class Publication
{
    public function publication(Post $post)
    {

        switch ($post->publication_status) {

            case Post::POST_DONT_PUBLICATION:
                $post->publication_status = Post::POST_ON_PUBLICATION;
                break;

            case Post::POST_ON_PUBLICATION:
                $post->publication_status = Post::POST_DONT_PUBLICATION;
                break;
        }

        $post->save();

        return $post->getPublication();
    }
}
