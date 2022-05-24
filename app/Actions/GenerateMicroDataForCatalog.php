<?php

namespace App\Actions;

class GenerateMicroDataForCatalog
{
    public function generate($title)
    {
        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'Product',
            'name' => $title,
            'offers' => [
                '@type' => 'AggregateOffer'
            ],
            'highPrice' => 5000,
            'lowPrice' => 1000,
            'priceCurrency' => 'RUB',
            'aggregateRating' => [
                '@type' => 'AggregateRating',
                'ratingValue' => 5,
                'worstRating' => 1,
                'bestRating' => 5,
                'reviewCount' => 5
            ],

        ];
    }
}
