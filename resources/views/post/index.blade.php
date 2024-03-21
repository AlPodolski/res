@extends('layouts.new_public')
@php
    /* @var $post \App\Models\Post */
    /* @var $morePosts \App\Models\Post[] */
    /* @var $viewPosts \App\Models\Post[] */
@endphp
@section('title', $metaData['title'])
@section('des', $metaData['des'])
@section('slick-css', '/new/css/slick.css')
@section('slick-theme', '/new/css/slick-theme.css')
@section('slick-js', '/new/js/slick.js')
@if($post->photo)
    @section('img',  '/521-741/thumbs'.$post->photo)
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

    <div class="col-12">
        <ul class="breadcrumb">
            <li class="breadcrumb-item home">
                <a class="breadcrumb-link" title="Главная" href="/">Главная</a>
            </li>
            <li class="breadcrumb-item" data-breadcrumbs="2">
                {{ $post->name }}
            </li>
        </ul>
    </div>

    @include('includes.message')

    @include('post.post-item')

    @widget('menu', ['city_id' =>  $cityInfo['id']])

@endsection
