@extends('layouts.app')

@php
    /* @var $post \App\Models\Post */
@endphp

@section('title', $metaData['title'])
@section('des', $metaData['des'])

@section('content')

    <ul class="breadcrumb">
        <li class="breadcrumb-item home">
            <a class="breadcrumb-link" title="Главная" href="/">Главная</a>
        </li>
        <li class="breadcrumb-item" data-breadcrumbs="2">
            {{ $post->name }}
        </li>
    </ul>

    @if($errors->any())

        <div class="col-12 alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span area-hidden="true">x</span>
            </button>
            {{ $errors->first() }}
        </div>

    @endif

    @if(session('success'))

        <div class="col-12 alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span area-hidden="true">x</span>
            </button>
            {{ session()->get('success') }}
        </div>

    @endif

    <div class="post-content">
        <div class="left">

            <picture>
                <source srcset="/370-526/thumbs{{$post->avatar->file}}" media="(max-width: 400px)">
                <source srcset="/521-741/thumbs{{$post->avatar->file}}">
                <img srcset="/521-741/thumbs{{$post->avatar->file}}" alt="{{ $post->name }}">
            </picture>
        </div>
        <div class="right">
            <h1>{{ $post->name }}</h1>
            <div class="post-price">
                {{ $post->price }} ₽
            </div>
            <div class="phone-favorite-wrap d-flex">
                <a href="tel:+{{ $post->phone }}" data-tel="{{ $post->phone }}" onclick="show_phone(this)"
                   class="phone single-phone">Показать телефон</a>
            </div>

            @php

                @endphp

            <div class="post-property-list">
                @if($post->metro->first())
                    <div class="property-item metro-list">
                        <div class="property-name">Метро</div>
                        <div class="d-flex">
                            @foreach($post->metro as $item)
                                <a class="property-value"
                                   href="/{{ $item->metro->filterUrl->filter_url }}">{{ $item->metro->value }} </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if($post->rayon)
                    <div class="property-item metro-list">
                        <div class="property-name">Район</div>
                        <a class="property-value"
                           href="/{{ $post->rayon->rayon->filterUrl->filter_url }}">{{ $post->rayon->rayon->value }}</a>

                    </div>
                @endif

                @if($post->time)
                    <div class="property-item metro-list">
                        <div class="property-name">Время встречи</div>
                        <div class="d-flex">
                            @foreach($post->time as $item)
                                <a href="/{{ $item->time->filterUrl->filter_url }}"
                                   class="property-value">{{ $item->time->value }} </a>
                            @endforeach
                        </div>

                    </div>
                @endif

                @if($post->place)
                    <div class="property-item metro-list">
                        <div class="property-name">Место встречи</div>
                        <div class="d-flex">
                            @foreach($post->place as $item)
                                <a href="/{{ $item->place->filterUrl->filter_url }}"
                                   class="property-value">{{ $item->place->value }} </a>
                            @endforeach
                        </div>
                    </div>
                @endif
                @if($post->age)
                    <div class="property-item">
                        <div class="property-name">Возраст</div>
                        <div class="property-value">{{ $post->age }}</div>
                    </div>
                @endif
                @if($post->ves)
                    <div class="property-item">
                        <div class="property-name">Вес</div>
                        <div class="property-value">{{ $post->ves }}</div>
                    </div>
                @endif
                @if($post->breast_size)
                    <div class="property-item">
                        <div class="property-name">Размер груди</div>
                        <div class="property-value">{{ $post->breast_size }}</div>
                    </div>
                @endif
                @if($post->national)
                    <div class="property-item">
                        <div class="property-name">Национальность</div>
                        <a href="/{{ $post->national->national->filterUrl->filter_url }}"
                           class="property-value">{{ $post->national->national->value }} </a>
                    </div>
                @endif
                @if($post->hair)
                    <div class="property-item">
                        <div class="property-name">Цвет волос</div>
                        <a href="/{{ $post->hair->hair->filterUrl->filter_url }}"
                           class="property-value">{{ $post->hair->hair->value }}</a>
                    </div>
                @endif
                @if($post->intimHair)
                    <div class="property-item">
                        <div class="property-name">Интимная стрижка</div>
                        <a href="/{{ $post->intimHair->value->filterUrl->filter_url }}"
                           class="property-value">{{ $post->intimHair->value->value }}</a>
                    </div>
                @endif
            </div>
        </div>


        @if($post->service->first())
            <div class="property-item metro-list">
                <div class="decr-title">
                    Услуги
                </div>
                <div class="d-flex">
                    @foreach($post->service as $item)
                        <a class="property-value"
                           href="/{{ $item->service->filterUrl->filter_url }}">{{ $item->service->value }} </a>
                    @endforeach
                </div>
            </div>
        @endif

        @if($post->about)
            <div class="post-decr">
                <div class="decr-title">
                    Описание
                </div>
                <div class="decr-text">
                    {{ $post->about }}
                </div>
            </div>
        @endif

        @if($post->gallery and $post->gallery->count())

            <div class="photo-wrap">
                <div class="decr-title">
                    Фото
                </div>
                <div class="popular-list post-photo">
                    @foreach($post->gallery as $item)
                        <div class="post-photo-item">

                            <picture>
                                <source srcset="/181-257/thumbs{{$item->file}}">
                                <img srcset="/181-257/thumbs{{$item->file}}" alt="{{ $post->name }}">
                            </picture>

                            <img src="{{ $item->file }}" alt="">
                        </div>
                    @endforeach
                </div>
            </div>

        @endif

        @if($post->selphi and $post->selphi->count())

            <div class="photo-wrap">
                <div class="decr-title">
                    Селфи
                </div>
                <div class="popular-list post-photo">
                    @foreach($post->selphi as $item)
                        <div class="post-photo-item">

                            <picture>
                                <source srcset="/181-257/thumbs{{$item->file}}">
                                <img srcset="/181-257/thumbs{{$item->file}}" alt="{{ $post->name }}">
                            </picture>

                            <img src="{{ $item->file }}" alt="">
                        </div>
                    @endforeach
                </div>
            </div>

        @endif
        <div class="col-12"></div>
        @if($post->video)
            <div class="post-decr">
                <div class="decr-title">
                    Видео
                </div>
                <div class="decr-text">
                    <video controls="controls" class="video">
                        <source src="{{ $post->video->file }}">
                    </video>
                </div>
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
        <form action="/comment/add" class="review-form" method="post">
            @csrf
            <div class="form-review-title">
                Оставить отзыв
            </div>
            <div class="field d-flex">
                <label for="name-{{ $post->id }}">Имя</label>
                <input type="text" required id="name-{{ $post->id }}" name="name" value="{{ old('name', '')  }}"
                       placeholder="Имя">
            </div>

            <input type="hidden" name="related_id" value="{{ $post->id }}">
            <input type="hidden" name="related_class" value="{{ \App\Models\Post::class }}">

            <div class="field d-flex">
                <label for="text-{{ $post->id }}">Комментарий</label>
                <textarea class="comment-text" required placeholder="Комментарий" name="text" id="text-{{ $post->id }}">
                    {{ old('text', '')  }}
                </textarea>
            </div>
            <button class="send-btn">Отправить</button>
        </form>
    </div>
    @widget('menu', ['city_id' =>  $cityInfo['id']  ])
@endsection
