<?php

namespace App\Console\Commands;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Console\Command;

class ImportComments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:comments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $comments = include(storage_path('comments.php'));

        $commentsByName = array();

        foreach ($comments as $comment) {

            $commentsByName[$comment['name']][] = array('text' => $comment['text'], 'author' => $comment['author']);

        }

        foreach ($commentsByName as $name => $comment) {

            if ($posts = Post::where(['name' => $name])->get()) {

                foreach ($posts as $post) {

                    if (rand(0,2) == 2){

                        $randComment = $comment[array_rand($comment)];

                        $postComment = new Comment();

                        $postComment->name = $randComment['author'];
                        $postComment->text = $randComment['text'];
                        $postComment->related_id = $post->id;
                        $postComment->related_class = Post::class;
                        $postComment->status = Comment::PUBLICATION_STATUS;

                        $postComment->save();

                    }

                }

            }

        }

    }

}
