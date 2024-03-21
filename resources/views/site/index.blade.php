@extends('layouts.new_public')

@section('title', $meta['title'])
@section('des', $meta['des'])

@if(isset($path) and $path)
    @section('can', $path)
@endif

@if(isset($yandexTag->tag))
    @section('yandex', $yandexTag->tag)
@endif

@section('content')

    @if(isset($microData) and $microData)
        <script type="application/ld+json">
            {!! json_encode($microData) !!}
        </script>
    @endif

    @if(isset($breadMicro) and $breadMicro)
        <script type="application/ld+json">
            {!! json_encode($breadMicro) !!}
        </script>
    @endif

    @include('includes.filter')

    @if($topList and false)
        <div class="popular-list d-flex">
            @foreach($topList as $topListItem)
                @include('includes.popular-item')
            @endforeach
        </div>
    @endif


    <div class="col-12">
        @isset($filterParams)
            <ul class="breadcrumb">
                <li class="breadcrumb-item home">
                    <a class="breadcrumb-link" title="Главная" href="/">Главная</a>
                </li>
                <li class="breadcrumb-item" data-breadcrumbs="2">
                    {{ $meta['h1'] }}
                </li>
            </ul>
            @widget('labelMenu', ['filterParams' => $filterParams])
        @endif
    </div>

    <div class="col-12">
        <h1>{{ $meta['h1'] }}</h1>
    </div>

    <div class="col-12">
        @include('includes.limit_and_order')
    </div>

    <div class="col-12 posts">
        <div class="row">
            @foreach($posts as $post)
                @include('site.includes.post-item')
            @endforeach
        </div>

    </div>

    @if(isset($metroInfo) and $metroInfo)

        <p>Местоположение на карте</p>

        <div class="map" id="map" style="height: 300px"
             data-x="{{ $metroInfo->x }}" data-y="{{ $metroInfo->y }}">
        </div>

        <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" defer></script>
        <script src="/js/map_yandex.js" defer></script>

    @endif

    @if(isset($morePosts) and $morePosts)

        <p>Популярные анкеты</p>

        <div class="posts">

            @foreach($morePosts as $post)

                @include('site.includes.post-item')

            @endforeach

        </div>

    @endif

    @if($posts->total() > $posts->count())

        <div data-url="{{ str_replace('http', 'https', $posts->nextPageUrl()) }}" onclick="getMorePosts(this)"
             class="get-more get-more-post-btn">Показать еще
        </div>

        {{ $posts->links() }}

    @endif

    @widget('menu', ['city_id' =>  $cityInfo['id']  ])
@endsection
