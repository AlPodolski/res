<?php

namespace App\Console\Commands;

use App\Models\IntimHair;
use App\Models\Post;
use App\Models\PostIntimHair;
use Illuminate\Console\Command;

class CustCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cust';

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
        $posts = Post::with('intimHair')->get();

        $intimHairList = IntimHair::all()->toArray();

        foreach ($posts as $post){

            if(!$post->intimHair) {

                $postIntimHair = new PostIntimHair();

                $postIntimHair->posts_id = $post->id;
                $postIntimHair->intim_hair_id = $intimHairList[array_rand($intimHairList)]['id'];
                $postIntimHair->city_id = $post->city_id;

                $postIntimHair->save();

            }

        }
    }
}
