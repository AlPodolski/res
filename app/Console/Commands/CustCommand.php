<?php

namespace App\Console\Commands;

use App\Models\City;
use App\Models\IntimHair;
use App\Models\Post;
use App\Models\PostIntimHair;
use App\Models\PostRayon;
use App\Models\Rayon;
use Illuminate\Console\Command;
use League\Csv\Reader;
use League\Csv\Statement;

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

        $posts = Post::get();

        foreach ($posts as $post){

            if (rand(0,3) == 3){

                $post->check_photo_status = Post::PHOTO_CHECK_STATUS;

                $post->save();

            }

        }

    }
}
