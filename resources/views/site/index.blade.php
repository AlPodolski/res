@extends('layouts.app')

@section('title', $meta['title'])
@section('des', $meta['des'])

@if(isset($path) and $path)
    @section('can', $path)
@endif

@section('content')

    @if($topList)

        <div class="popular-list d-flex">

            @foreach($topList as $topListItem)

                <div class="popular-item post-photo-item">
                    <a href="/post/{{ $topListItem->url }}">
                        <picture>
                            <source srcset="/370-526/thumbs{{$topListItem->avatar->file}}" media="(max-width: 400px)">
                            <source srcset="/211-300/thumbs{{$topListItem->avatar->file}}">
                            <img loading="lazy" class="popular-img " srcset="/211-300/thumbs{{$topListItem->avatar->file}}"
                                 alt="{{ $topListItem->name }}">
                        </picture>
                    </a>
                </div>

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

        <div data-url="{{ str_replace('http', 'https', $posts->nextPageUrl()) }}" onclick="getMorePosts(this)" class="get-more">Показать еще <img src="/img/more.svg" alt=""></div>

        {{ $posts->links() }}

    @endif

    @widget('menu', ['city_id' =>  $cityInfo['id']  ])
@endsection
