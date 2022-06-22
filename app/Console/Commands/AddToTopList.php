<?php

namespace App\Console\Commands;

use App\Models\City;
use App\Models\Post;
use App\Models\TopList;
use Illuminate\Console\Command;

class AddToTopList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'top-list:add';

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
        $cityList = City::get();

        foreach ($cityList as $cityItem) {

            $post = Post::where(['city_id' => $cityItem->id])->orderByRaw('RAND()')->first();

            if ($post) {

                $topList = new TopList();

                $topList->city_id = $cityItem->id;
                $topList->post_id = $post->id;

                $topList->save();

            }

        }
    }
}
