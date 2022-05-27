@extends('layouts.app')

@section('title', $meta['title'])
@section('des', $meta['des'])

@if(isset($path) and $path)
    @section('can', $path)
@endif

@if(isset($yandexTag->tag))
    @section('yandex', $yandexTag->tag)
@endif

@if(isset($microData) and $microData)
    <script type="application/ld+json">
        {{ json_encode($microData) }}
    </script>
@endif

@if(isset($breadMicro) and $breadMicro)
        <script type="application/ld+json">
        {{ json_encode($breadMicro) }}
    </script>
@endif

@section('content')

    @include('includes.filter')

    @if($topList)

        <div class="popular-list d-flex">

            @foreach($topList as $topListItem)

                @if(isset($topListItem->avatar->file))

                    <div class="popular-item post-photo-item">
                        <a href="/post/{{ $topListItem->url }}">
                            <picture>
                                <source srcset="/139-185/thumbs{{$topListItem->avatar->file}}"
                                        media="(max-width: 361px)">
                                <source srcset="/370-526/thumbs{{$topListItem->avatar->file}}"
                                        media="(max-width: 400px)">
                                <source srcset="/163-238/thumbs{{$topListItem->avatar->file}}">
                                <img width="163px" height="238px"
                                     title="Проститутка {{ $topListItem->name }}" loading="lazy" class="popular-img "
                                     srcset="/163-238/thumbs{{$topListItem->avatar->file}}"
                                     alt="{{ $topListItem->name }}">
                            </picture>
                        </a>
                    </div>

                @endif

            @endforeach

        </div>

    @endif

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
    <h1>{{ $meta['h1'] }}</h1>

    <div class="posts">

        @foreach($posts as $post)
            @include('site.includes.post-item')
        @endforeach

    </div>

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
             class="get-more">Показать еще <img width="24px" height="24px" src="/img/more.svg" alt=""></div>

        {{ $posts->links() }}

    @endif

    @widget('menu', ['city_id' =>  $cityInfo['id']  ])
@endsection
