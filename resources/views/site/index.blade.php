@php

    @endphp

@extends('layouts.app')

@section('title', 'Главная страница')

@section('content')

    <div class="popular-list">
        <div class="popular-item">
            <img class="popular-img" src="/img/w6clkqkf.jpg" alt="">
        </div>
        <div class="popular-item">
            <img class="popular-img" src="/img/rm2tjcx1.jpg" alt="">
        </div>
        <div class="popular-item">
            <img class="popular-img" src="/img/w6clkqkf.jpg" alt="">
        </div>
        <div class="popular-item">
            <img class="popular-img" src="/img/rm2tjcx1.jpg" alt="">
        </div>
        <div class="popular-item">
            <img class="popular-img" src="/img/w6clkqkf.jpg" alt="">
        </div>
        <div class="popular-item">
            <img class="popular-img" src="/img/rm2tjcx1.jpg" alt="">
        </div>
        <div class="popular-item">
            <img class="popular-img" src="/img/w6clkqkf.jpg" alt="">
        </div>
        <div class="popular-item">
            <img class="popular-img" src="/img/rm2tjcx1.jpg" alt="">
        </div>
    </div>

    <h1>Модная одежда</h1>

    <div class="posts">

        @foreach($posts as $post)
            @php
                /* @var $post \App\Models\Post */
            @endphp

            <div class="post-item ">
                <a href="/post/{{$post->url}}">
                    <img src="/img/girl.jpg" alt="">
                </a>
                <a href="/post/{{$post->url}}" class="name">{{$post->name}}</a>
                <div class="price">{{ $post->price }} ₽</div>
                <a href="tel:+{{$post->phone}}" class="phone">Показать телефон</a>
            </div>

        @endforeach

        <div class="post-item ">
            <img src="/img/nigga.jpg" alt="">
            <div class="name">Вил Смит</div>
            <div class="price">3500 ₽</div>
            <a href="tel:+79637220907" class="phone">Показать телефон</a>
        </div>
    </div>
    <div class="get-more">Показать еще <img src="/img/more.svg" alt=""></div>
    @if($posts->total() > $posts->count())

        {{ $posts->links() }}

    @endif
@endsection
