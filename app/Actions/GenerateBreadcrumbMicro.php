<?php

namespace App\Actions;

class GenerateBreadcrumbMicro
{
    public function generate( $request, $name): array
    {
        $host = $request->getHttpHost();
        $url = $request->path();

        return [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => [array(
                '@type' => 'ListItem',
                'position' => 1,
                'item' => [
                    '@id' => 'https://'.$host,
                    'name' => 'Главная'
                ]),
                array(
                '@type' => 'ListItem',
                'position' => 2,
                'item' => [
                    '@id' => 'https://'.$host.'/'.$url,
                    'name' => $name
                ]),
            ]
        ];
    }
}

