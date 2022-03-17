@extends('layouts.app')

@php
/* @var $post \App\Models\Post */
@endphp

@section('title', $post->name)

@section('content')

    <ul class="breadcrumb">
        <li class="breadcrumb-item home">
            <a class="breadcrumb-link" title="Главная" href="/">Главная</a>
        </li>
        <li class="breadcrumb-item" data-breadcrumbs="2">
            {{ $post->name }}
        </li>
    </ul>

    <div class="post-content">
        <div class="left">
            <img src="/img/nigga.jpg" alt="">
        </div>
        <div class="right">
            <h1>{{ $post->name }}</h1>
            <div class="post-price">
                {{ $post->price }} ₽
            </div>
            <div class="phone-favorite-wrap d-flex">
                <a href="tel:+{{ $post->phone }}" class="phone single-phone">Показать телефон</a>
                <div class="add-to-favorite">
                    <img src="/img/heart-grey.svg" alt="">
                </div>
            </div>

            <div class="post-property-list">
                <div class="property-item">
                    <div class="property-name">Метро</div>
                    <div class="property-value">Арбат</div>
                </div>
                <div class="property-item">
                    <div class="property-name">Район</div>
                    <div class="property-value">Арбат</div>
                </div>
                <div class="property-item">
                    <div class="property-name">Возраст</div>
                    <div class="property-value">{{ $post->age }}</div>
                </div>
                <div class="property-item">
                    <div class="property-name">Вес</div>
                    <div class="property-value">{{ $post->ves }}</div>
                </div>
                <div class="property-item">
                    <div class="property-name">Размер груди</div>
                    <div class="property-value">{{ $post->breast_size }}</div>
                </div>
                <div class="property-item">
                    <div class="property-name">Национальность</div>
                    <div class="property-value">Русская </div>
                </div>
                <div class="property-item">
                    <div class="property-name">Цвет волос</div>
                    <div class="property-value">Блондинка</div>
                </div>
                <div class="property-item">
                    <div class="property-name">Интимная стрижка</div>
                    <div class="property-value">C полной депиляцией </div>
                </div>
            </div>
        </div>
        <div class="post-decr">
            <div class="decr-title">
                Описание
            </div>
            <div class="decr-text">
                {{ $post->about }}
            </div>
        </div>
        <div class="decr-title">
            Фото
        </div>
        <div class="popular-list post-photo">
            <div class="post-photo-item">
                <img src="/img/nigga.jpg" alt="">
            </div>
            <div class="post-photo-item">
                <img src="/img/girl.jpg" alt="">
            </div>
            <div class="post-photo-item">
                <img src="/img/nigga.jpg" alt="">
            </div>
            <div class="post-photo-item">
                <img src="/img/girl.jpg" alt="">
            </div>
            <div class="post-photo-item">
                <img src="/img/nigga.jpg" alt="">
            </div>
            <div class="post-photo-item">
                <img src="/img/girl.jpg" alt="">
            </div>
            <div class="post-photo-item">
                <img src="/img/nigga.jpg" alt="">
            </div>
            <div class="post-photo-item">
                <img src="/img/girl.jpg" alt="">
            </div>
            <div class="post-photo-item">
                <img src="/img/nigga.jpg" alt="">
            </div>
            <div class="post-photo-item">
                <img src="/img/girl.jpg" alt="">
            </div>
            <div class="post-photo-item">
                <img src="/img/nigga.jpg" alt="">
            </div>
            <div class="post-photo-item">
                <img src="/img/girl.jpg" alt="">
            </div>
        </div>
        <div class="decr-title">
            Отзывы
        </div>
        <div class="review-list">
            <div class="review-item">
                Отзывов еще никто не оставлял
            </div>
        </div>
    </div>

@endsection
