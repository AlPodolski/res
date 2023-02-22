<?php

namespace App\Observers;

use App\Models\Files;
use App\Models\Post;
use App\Models\PostService;
use App\Services\FilterUrlService;
use Storage;

class PostsObserver
{
    /**
     * Handle the post "created" event.
     *
     * @param \App\Models\Post $post
     * @return void
     */
    public function creating(Post $post)
    {
        $post->phone = preg_replace('/[^0-9]/', '', $post->phone);
    }

    /**
     * Handle the post "created" event.
     *
     * @param \App\Models\Post $post
     * @return void
     */
    public function created(Post $post)
    {
        $post->url = \Str::slug($post->name).'-'.$post->id;
        $post->save();
    }

    /**
     * Handle the post "updated" event.
     *
     * @param \App\Models\Post $post
     * @return void
     */
    public function updated(Post $post)
    {
        //
    }

    /**
     * Handle the post "deleted" event.
     *
     * @param \App\Models\Post $post
     * @return void
     * @throws \Exception
     */
    public function deleted(Post $post)
    {
        $postFiles = Files::where(['related_id' => $post->id])->get();

        if ($postFiles) {

            foreach ($postFiles as $file) {
                $path = (storage_path('app/public' . $file->file));
                if (file_exists($path)){

                    unlink($path);

                }

                $file->delete();
            }

        }
    }

    /**
     * Handle the post "restored" event.
     *
     * @param \App\Models\Post $post
     * @return void
     */
    public function restored(Post $post)
    {
        //
    }

    /**
     * Handle the post "force deleted" event.
     *
     * @param \App\Models\Post $post
     * @return void
     */
    public function forceDeleted(Post $post)
    {
        //
    }
}
