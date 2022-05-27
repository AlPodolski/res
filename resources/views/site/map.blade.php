<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9">

    @php
        /* @var $posts \App\Models\Post[] */
    @endphp

    <url>
        <loc>https://{{ $_SERVER['HTTP_HOST'] }}</loc>
        <lastmod>2022-05-27</lastmod>
        <priority>1</priority>
    </url>

    @if($posts)

        @foreach($posts as $post)

            <url>
                <loc>https://{{ $_SERVER['HTTP_HOST'] }}/post/{{ $post->url }}</loc>
                <lastmod>2022-05-27</lastmod>
                <priority>0.9</priority>
            </url>

        @endforeach

    @endif

    @if($data['metro'])

        @foreach($data['metro'] as $metro)

            <url>
                <loc>https://{{ $_SERVER['HTTP_HOST'] }}/{{ $metro->filter_url }}</loc>
                <lastmod>2022-05-27</lastmod>
                <priority>0.9</priority>
            </url>

        @endforeach

    @endif

    @if($data['rayon'])

        @foreach($data['rayon'] as $dataItem)

            <url>
                <loc>https://{{ $_SERVER['HTTP_HOST'] }}/{{ $dataItem->filter_url }}</loc>
                <lastmod>2022-05-27</lastmod>
                <priority>0.9</priority>
            </url>

        @endforeach

    @endif

    @if($data['time'])

        @foreach($data['time'] as $dataItem)

            <url>
                <loc>https://{{ $_SERVER['HTTP_HOST'] }}/{{ $dataItem->filter_url }}</loc>
                <lastmod>2022-05-27</lastmod>
                <priority>0.9</priority>
            </url>

        @endforeach

    @endif

    @if($data['place'])

        @foreach($data['place'] as $dataItem)

            <url>
                <loc>https://{{ $_SERVER['HTTP_HOST'] }}/{{ $dataItem->filter_url }}</loc>
                <lastmod>2022-05-27</lastmod>
                <priority>0.9</priority>
            </url>

        @endforeach

    @endif

    @if($data['national'])

        @foreach($data['national'] as $dataItem)

            <url>
                <loc>https://{{ $_SERVER['HTTP_HOST'] }}/{{ $dataItem->filter_url }}</loc>
                <lastmod>2022-05-27</lastmod>
                <priority>0.9</priority>
            </url>

        @endforeach

    @endif

    @if($data['hairColor'])

        @foreach($data['hairColor'] as $dataItem)

            <url>
                <loc>https://{{ $_SERVER['HTTP_HOST'] }}/{{ $dataItem->filter_url }}</loc>
                <lastmod>2022-05-27</lastmod>
                <priority>0.9</priority>
            </url>

        @endforeach

    @endif

    @if($data['intimHair'])

        @foreach($data['intimHair'] as $dataItem)

            <url>
                <loc>https://{{ $_SERVER['HTTP_HOST'] }}/{{ $dataItem->filter_url }}</loc>
                <lastmod>2022-05-27</lastmod>
                <priority>0.9</priority>
            </url>

        @endforeach

    @endif

    @if($data['age'])

        @foreach($data['age'] as $dataItem)

            <url>
                <loc>https://{{ $_SERVER['HTTP_HOST'] }}/{{ $dataItem->filter_url }}</loc>
                <lastmod>2022-05-27</lastmod>
                <priority>0.9</priority>
            </url>

        @endforeach

    @endif

    @if($data['price'])

        @foreach($data['price'] as $dataItem)

            <url>
                <loc>https://{{ $_SERVER['HTTP_HOST'] }}/{{ $dataItem->filter_url }}</loc>
                <lastmod>2022-05-27</lastmod>
                <priority>0.9</priority>
            </url>

        @endforeach

    @endif

    @if($data['service'])

        @foreach($data['service'] as $dataItem)

            <url>
                <loc>https://{{ $_SERVER['HTTP_HOST'] }}/{{ $dataItem->filter_url }}</loc>
                <lastmod>2022-05-27</lastmod>
                <priority>0.9</priority>
            </url>

        @endforeach

    @endif

</urlset>
