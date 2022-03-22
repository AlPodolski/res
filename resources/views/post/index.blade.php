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
            <img src="{{ $post->avatar->file }}" alt="">
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
                @if($post->metro)
                    <div class="property-item metro-list">
                        <div class="property-name">Метро</div>
                        <div class="d-flex">
                            @foreach($post->metro as $item)
                                <div class="property-value">{{ $item->metro->value }} </div>
                            @endforeach
                        </div>

                    </div>
                @endif

                @if($post->rayon)
                    <div class="property-item metro-list">
                        <div class="property-name">Район</div>
                        <div class="property-value">{{ $post->rayon->rayon->value }}</div>

                    </div>
                @endif

                @if($post->time)
                    <div class="property-item metro-list">
                        <div class="property-name">Время встречи</div>
                        <div class="d-flex">
                            @foreach($post->time as $item)
                                <div class="property-value">{{ $item->time->value }} </div>
                            @endforeach
                        </div>

                    </div>
                @endif

                @if($post->place)
                    <div class="property-item metro-list">
                        <div class="property-name">Место встречи</div>
                        <div class="d-flex">
                            @foreach($post->place as $item)
                                <div class="property-value">{{ $item->place->value }} </div>
                            @endforeach
                        </div>
                    </div>
                @endif

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
                    <div class="property-value">{{ $post->national->national->value }} </div>
                </div>

                <div class="property-item">
                    <div class="property-name">Цвет волос</div>
                    <div class="property-value">{{ $post->hair->hair->value }}</div>
                </div>

                <div class="property-item">
                    <div class="property-name">Интимная стрижка</div>
                    <div class="property-value">{{ $post->intimHair->value->value }}</div>
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

        @if($post->gallery)
            <div class="decr-title">
                Фото
            </div>
            <div class="popular-list post-photo">
                @foreach($post->gallery as $item)
                    <div class="post-photo-item">
                        <img src="{{ $item->file }}" alt="">
                    </div>
                @endforeach
            </div>
        @endif

        <div class="decr-title">
            Отзывы
        </div>
        <div class="review-list">
            <div class="review-item">
                Отзывов еще никто не оставлял
            </div>
        </div>
    </div>
    @widget('menu', ['city_id' =>  $cityInfo['id']  ])
@endsection
