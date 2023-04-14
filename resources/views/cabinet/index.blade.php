@extends('layouts.cabinet')

@section('title', 'Кабинет')

@php
 /* @var $postsList \App\Models\Post[] */
@endphp

@if(isset($path) and $path)
    @section('can', $path)
@endif

@section('content')

    <h1>Кабинет</h1>

    <div class="posts">
        <div class="post-item position-relative items-center d-flex white-cabinet-block">
            <div class="plus-wrap d-flex items-center">
                <a href="/cabinet/post/create">
                    <span class="plus d-flex items-center">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11.4 5.4H6.60004V0.599963C6.60004 0.268835 6.3312 0 5.99996 0C5.66884 0 5.4 0.268835 5.4 0.599963V5.4H0.599963C0.268835 5.4 0 5.66884 0 5.99996C0 6.3312 0.268835 6.60004 0.599963 6.60004H5.4V11.4C5.4 11.7312 5.66884 12 5.99996 12C6.3312 12 6.60004 11.7312 6.60004 11.4V6.60004H11.4C11.7312 6.60004 12 6.3312 12 5.99996C12 5.66884 11.7312 5.4 11.4 5.4Z"
                                fill="white"></path>
                        </svg>
                    </span>
                </a>
            </div>
            <a href="/cabinet/post/create">
                Добавить анкету
            </a>
        </div>

        @if(isset($postsList) and $postsList)
            @foreach($postsList as $post)
                @include('cabinet.includes.post-item')
            @endforeach
        @endif

    </div>
    @widget('menu', ['city_id' =>  $cityInfo['id']  ])
@endsection
