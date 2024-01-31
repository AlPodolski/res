@extends('layouts.cabinet')

@section('title', 'Кабинет')

@php
    /* @var $postsList \App\Models\Post[] */
@endphp

@if(isset($path) and $path)
    @section('can', $path)
@endif

@section('content')

    @include('cabinet.includes.sidebar')

    <main class="main col-lg-9">

        <h1>Кабинет</h1>

        @if($postsList->count())
            <div class="fast-links">
                <div class="fast-link-item ankets__item-moder" onclick="start_all(this)">Включить все анкеты</div>
            </div>
        @endif

        <div class="ankets__items">

            @if(isset($postsList) and $postsList)
                @foreach($postsList as $post)
                    @include('cabinet.includes.post-item')
                @endforeach
            @endif

        </div>

    </main>

@endsection
