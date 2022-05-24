<?php

namespace App\Actions;

use Cache;
use Carbon\Carbon;

class GenerateMicroDataForCatalog
{
    public function generate($title, $posts, $url, $cityId)
    {

        $expire = Carbon::now()->addMinutes(100000);

        $data = Cache::remember('rating_'.$url.'_'.$cityId, $expire, function () use ($title, $posts) {

            $minPrice = $this->getMinPrice($posts);
            $maxPrice = $this->getMaxPrice($posts);
            $rating = $this->getRandRating();
            $reviewCount = rand(50, 100);

            return [
                '@context' => 'https://schema.org',
                '@type' => 'Product',
                'name' => $title,
                'offers' => [
                    '@type' => 'AggregateOffer'
                ],
                'highPrice' => $maxPrice,
                'lowPrice' => $minPrice,
                'priceCurrency' => 'RUB',
                'aggregateRating' => [
                    '@type' => 'AggregateRating',
                    'ratingValue' => $rating,
                    'worstRating' => 1,
                    'bestRating' => 5,
                    'reviewCount' => $reviewCount
                ],

            ];


        });

        return $data;

    }

    private function getRandRating(){

        $firstData = rand(4,5);

        if ($firstData != 5) return $firstData. rand(0, 9);

        return $firstData;

    }

    private function getMinPrice( $posts){

        $price = $posts->first()->price;

        foreach($posts as $post){

            if ($price < $post->price ) $price = $post->price;

        }

        return $price;

    }

    private function getMaxPrice( $posts){

        $price = $posts->first()->price;

        foreach($posts as $post){

            if ($price > $post->price ) $price = $post->price;

        }

        return $price;

    }

}
