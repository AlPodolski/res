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

        foreach ($dataList as $dataItem) {

            $data = [
                'filter_url' => $filterUrlService->makeUrlForFilterTable($dataItem->value),
                'related_class' => \App\Models\PostMetro::class,
                'related_param' => 'metros_id',
                'search_param' => 'posts_id',
                'related_id' => $dataItem->id,
                'parent_class' => \App\Models\Metro::class,
                'city_id' => $dataItem->city_id,
            ];

            DB::table('filters')->insert($data);

        }

        $dataList = \App\Models\Rayon::get();

        foreach ($dataList as $dataItem) {

            $data = [
                'filter_url' => $filterUrlService->makeUrlForFilterTable($dataItem->value),
                'related_class' => \App\Models\PostRayon::class,
                'related_param' => 'rayons_id',
                'search_param' => 'posts_id',
                'related_id' => $dataItem->id,
                'parent_class' => \App\Models\Rayon::class,
                'city_id' => $dataItem->city_id,
            ];

            DB::table('filters')->insert($data);

        }


        $dataList = \App\Models\Time::get();

        foreach ($dataList as $dataItem) {

            $data = [
                'filter_url' => $filterUrlService->makeUrlForFilterTable($dataItem->value),
                'related_class' => \App\Models\PostTime::class,
                'related_param' => 'param_id',
                'search_param' => 'posts_id',
                'related_id' => $dataItem->id,
                'parent_class' => \App\Models\Time::class,
            ];

            DB::table('filters')->insert($data);

        }

        $dataList = \App\Models\Place::get();

        foreach ($dataList as $dataItem) {

            $data = [
                'filter_url' => $filterUrlService->makeUrlForFilterTable($dataItem->value),
                'related_class' => \App\Models\PostPlace::class,
                'related_param' => 'place_id',
                'search_param' => 'post_id',
                'related_id' => $dataItem->id,
                'parent_class' => \App\Models\Place::class,
            ];

            DB::table('filters')->insert($data);

        }

        $dataList = \App\Models\National::get();

        foreach ($dataList as $dataItem) {

            $data = [
                'filter_url' => $filterUrlService->makeUrlForFilterTable($dataItem->value),
                'related_class' => \App\Models\PostNational::class,
                'related_param' => 'nationals_id',
                'search_param' => 'post_nationals_id',
                'related_id' => $dataItem->id,
                'parent_class' => \App\Models\National::class,
            ];

            DB::table('filters')->insert($data);

        }

        $dataList = \App\Models\IntimHair::get();

        foreach ($dataList as $dataItem) {

            $data = [
                'filter_url' => $filterUrlService->makeUrlForFilterTable($dataItem->value),
                'related_class' => \App\Models\PostIntimHair::class,
                'related_param' => 'intim_hair_id',
                'search_param' => 'posts_id',
                'related_id' => $dataItem->id,
                'parent_class' => \App\Models\IntimHair::class,
            ];

            DB::table('filters')->insert($data);

        }

    }

}
