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

        $posts = Post::with('metro', 'rayon')->where(['city_id' => 1])->get();

        $stream = \fopen(storage_path('metro-rayon.csv'), 'r');

        $csv = Reader::createFromStream($stream);
        $csv->setDelimiter(';');
        $csv->setHeaderOffset(0);
        //build a statement
        $stmt = (new Statement());

        $records = $stmt->process($csv);

        $phonesCity = array();

        foreach ($records as $value) {

            $phonesCity[$value['rayon']][] = $value['metro'];

        }

        foreach ($posts as $post) {

            if ($post->metro and !$post->rayon and $metroItem = $post->metro->first()) {

                foreach ($phonesCity as $key => $item){

                    if (in_array($metroItem->metro->value, $item)){

                        $rayon = Rayon::where(['value' => $key])->get()->first();

                        if ($rayon) {

                            $postRayon = new PostRayon();

                            $postRayon->posts_id = $post->id;
                            $postRayon->city_id = 1;
                            $postRayon->rayons_id = $rayon->id;

                            $postRayon->save();

                            break;

                        }

                    }

                }

            }

        }


    }
}
