<?php

namespace App\Console\Commands;

use App\Models\City;
use App\Models\Files;
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
        $files = Files::where('type', Files::MAIN_PHOTO_TYPE)
            ->where('related_class', Post::class)
            ->get();

        foreach ($files as $file){

            $post = Post::where('id', $file->related_id)->first();

            $post->photo = $file->file;

            $post->save();

        }
    }
}
