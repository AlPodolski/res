<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use League\Csv\Reader;
use League\Csv\Statement;

class AddMeta extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:meta';

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
        $stream = \fopen(storage_path('meta.csv'), 'r');

        $csv = Reader::createFromStream($stream);
        $csv->setDelimiter(';');
        $csv->setHeaderOffset(0);
        //build a statement
        $stmt = (new Statement());

        $records = $stmt->process($csv);

        \DB::statement('delete from `metas` ');

        $data = array();

        $data[] = [
            'url' => 'metro',
            'title' => 'Проститутки у метро :metro :city3',
            'des' => 'Анкеты индивидуалок у метро :metro. Номера и отзывы шлюх рядом с метро :metro :city3',
            'h1' => 'Проститутки :metro',
        ];

        $data[] = [
            'url' => 'rayon',
            'title' => 'Проститутки :rayon, найти индивидуалку в районе :rayon :city3',
            'des' => 'Проститутки в районе :rayon с номерами телефонов проверенными фото и отзывами клиентов, на нашем сайте есть простой поиск индивидуалок в районе :rayon :city3',
            'h1' => 'Проститутки :rayon',
        ];

        foreach ($records as $value) {

            $data[] = $value;

        }

        \DB::table('metas')->insert($data);

    }
}
