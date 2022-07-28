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

    public function addViewPhone()
    {
        $this->post->sorting = $this->post->sorting + 5;
        $this->post->phone_view_count = $this->post->phone_view_count + 1;

        $this->post->save();

        return $this;
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
