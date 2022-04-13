<?php

namespace App\Console\Commands;

use App\Models\City;
use App\Models\Post;
use Illuminate\Console\Command;
use League\Csv\Reader;
use League\Csv\Statement;

class ImportPhone extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:phone';

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
        $stream = \fopen(storage_path('phones_16_02_2022.csv'), 'r');

        $csv = Reader::createFromStream($stream);
        $csv->setDelimiter(';');
        $csv->setHeaderOffset(0);
        //build a statement
        $stmt = (new Statement());

        $records = $stmt->process($csv);

        $phonesCity = array();

        foreach ($records as $value) {

            $phonesCity[$value['city']][] = $value['phone'];

        }

        foreach ($phonesCity as $key => $cityItem){

            if ($city = City::where(['city' => $key])->get()->first()){

                if ($posts = Post::where(['phone' => '', 'city_id' => $city['id']])->get()){

                    foreach ($posts as $post){

                        $post->phone = $cityItem[\array_rand($cityItem)];

                        $post->save();

                    }

                }

            }else{

                echo $key.\PHP_EOL;

            }

        }


    }
}
