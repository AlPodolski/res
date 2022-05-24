@extends('layouts.app')

@php
    /* @var $post \App\Models\Post */
@endphp

@section('title', $metaData['title'])
@section('des', $metaData['des'])

@if(isset($breadMicro) and $breadMicro)
    <script type="application/ld+json">
        {{ json_encode($breadMicro) }}
    </script>
@endif

@section('content')

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

    <div class="get-more-post-btn" onclick="getMorePost()">
        Загрузить еще
    </div>

    @widget('menu', ['city_id' =>  $cityInfo['id']  ])

@endsection
