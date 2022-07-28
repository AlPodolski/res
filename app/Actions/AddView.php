<?php

namespace App\Actions;

use App\Models\Post;

class AddView
{

    /* @var Post */
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function addView()
    {
        $this->addSort()->addViewCookie();
    }

    private function addSort()
    {
        $this->post->sorting = $this->post->sorting + 1;

        $this->post->save();

        return $this;
    }


    private function addViewCookie(){

        (new AddViewToCookie())->add($this->post->id);

    }


}
