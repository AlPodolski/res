@extends('layouts.app')
@php
    /* @var $post \App\Models\Post */
    /* @var $morePosts \App\Models\Post[] */
    /* @var $viewPosts \App\Models\Post[] */
@endphp
@section('title', $metaData['title'])
@section('des', $metaData['des'])
@if(isset($post->avatar->file))
    @section('img',  '/521-741/thumbs'.$post->avatar->file)
@endif
@section('content')

    @if(isset($breadMicro) and $breadMicro)
        <script type="application/ld+json">
            {!! json_encode($breadMicro) !!}
        </script>
    @endif
    @if(isset($imageMicro) and $imageMicro)
        <script type="application/ld+json">
            {!! $imageMicro  !!}
        </script>
    @endif

    @include('includes.filter')

    <ul class="breadcrumb">
        <li class="breadcrumb-item home">
            <a class="breadcrumb-link" title="Главная" href="/">Главная</a>
        </li>
        <li class="breadcrumb-item" data-breadcrumbs="2">
            {{ $post->name }}
        </li>
    </ul>

    @include('includes.message')

    <div class="post-wrap">
        @include('post.post-item')
    </div>

    @if($morePosts)

        <div class="photo-wrap more-posts">
            <div class="decr-title">
                Похожие анкеты
            </div>
            <div class="popular-list post-photo">
                @foreach($morePosts as $post)
                    @include('site.includes.post-item')
                @endforeach
            </div>
        </div>

    @endif

    @if($viewPosts)

        <div class="photo-wrap more-posts">
            <div class="decr-title">
                Просмотренные анкеты
            </div>
            <div class="popular-list post-photo">
                @foreach($viewPosts as $post)
                    @include('site.includes.post-item')
                @endforeach
            </div>
        </div>

    @endif

    @widget('menu', ['city_id' =>  $cityInfo['id']  ])

@endsection
