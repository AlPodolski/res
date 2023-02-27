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
        $stream = \fopen(storage_path('city_kor.csv'), 'r');

        $csv = Reader::createFromStream($stream);
        $csv->setDelimiter(';');
        $csv->setHeaderOffset(0);
        //build a statement
        $stmt = (new Statement());

        $records = $stmt->process($csv);

        $data = array();

        foreach ($records as $value) {

            $data[] = $value;

        }

        foreach ($data as $item){

            if ($city = City::where('city', $item['city'])->first()){

                $city->x = $item['x'];
                $city->y = $item['y'];

                $city->save();

            }

        }

    }
}
