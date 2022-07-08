@extends('layouts.app')

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

    @if($topList)

        <div class="popular-list d-flex">

            @foreach($topList as $topListItem)

                @php
                    /* @var $topListItem \App\Models\TopList */
                @endphp

                @if(isset($topListItem->post->avatar->file))

                    <div class="popular-item post-photo-item">
                        <a href="/post/{{ $topListItem->post->url }}">
                            <picture>
                                <source srcset="/139-185/thumbs{{$topListItem->post->avatar->file}}"
                                        media="(max-width: 361px)">
                                <source srcset="/370-526/thumbs{{$topListItem->post->avatar->file}}"
                                        media="(max-width: 400px)">
                                <source srcset="/163-238/thumbs{{$topListItem->post->avatar->file}}">
                                <img width="163px" height="238px"
                                     title="Проститутка {{ $topListItem->post->name }}" loading="lazy"
                                     class="popular-img "
                                     srcset="/163-238/thumbs{{$topListItem->post->avatar->file}}"
                                     alt="{{ $topListItem->post->name }}">
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

    @include('includes.limit_and_order')

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
             class="get-more get-more-post-btn">Показать еще
        </div>

        {{ $posts->links() }}

    @endif

    @widget('menu', ['city_id' =>  $cityInfo['id']  ])
@endsection
