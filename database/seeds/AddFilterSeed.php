<?php

use Illuminate\Database\Seeder;

class AddFilterSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $dataList = \App\Models\Metro::get();

        $filterUrlService = new \App\Services\FilterUrlService();

        foreach ($dataList as $dataItem){

            $data = [
                'filter_url' => $filterUrlService->makeUrlForFilterTable($dataItem->value) ,
                'related_class' => \App\Models\PostMetro::class,
                'related_param' => 'metros_id',
                'search_param' => 'posts_id',
                'related_id' => $dataItem->id,
                'parent_class' => \App\Models\Metro::class,
            ];

            DB::table('filters')->insert($data);

        }

    }
}
