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
                'short_name' => 'metro',
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
                'short_name' => 'rayon',
            ];

            DB::table('filters')->insert($data);

        }

        $dataList = \App\Models\Service::get();

        foreach ($dataList as $dataItem) {

            $data = [
                'filter_url' => $filterUrlService->makeUrlForFilterTable($dataItem->value),
                'related_class' => \App\Models\PostService::class,
                'related_param' => 'service_id',
                'search_param' => 'posts_id',
                'related_id' => $dataItem->id,
                'parent_class' => \App\Models\Service::class,
                'city_id' => $dataItem->city_id,
                'short_name' => 'service',
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
                'short_name' => 'time',
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
                'short_name' => 'place',
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
                'short_name' => 'national',
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
                'short_name' => 'intimhair',
            ];

            DB::table('filters')->insert($data);

        }

        $dataList = \App\Models\HairColor::get();

        foreach ($dataList as $dataItem) {

            $data = [
                'filter_url' => $filterUrlService->makeUrlForFilterTable($dataItem->value),
                'related_class' => \App\Models\PostHairColor::class,
                'related_param' => 'hair_colors_id',
                'search_param' => 'posts_id',
                'related_id' => $dataItem->id,
                'parent_class' => \App\Models\HairColor::class,
                'short_name' => 'hair',
            ];

            DB::table('filters')->insert($data);

        }

        $dataList = \App\Models\Age::get();

        foreach ($dataList as $dataItem) {

            $data = [
                'filter_url' => $filterUrlService->makeUrlForFilterTable($dataItem->value),
                'related_id' => $dataItem->id,
                'parent_class' => \App\Models\Age::class,
                'type' => 'custom',
                'short_name' => 'age',
            ];

            DB::table('filters')->insert($data);

        }

        $dataList = \App\Models\Price::get();

        foreach ($dataList as $dataItem) {

            $data = [
                'filter_url' => $filterUrlService->makeUrlForFilterTable($dataItem->value),
                'related_id' => $dataItem->id,
                'parent_class' => \App\Models\Price::class,
                'type' => 'custom',
                'short_name' => 'price',
            ];

            DB::table('filters')->insert($data);

        }

    }

}
