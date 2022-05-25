@php
    /* @var $post \App\Models\Post */
@endphp

<div class="post-item position-relative">
    <a href="/post/{{$post->url}}" class="d-block">
        @if(isset($post->avatar->file))
            <picture>
                <source srcset="/314-441/thumbs{{$post->avatar->file}}"
                        media="(max-width: 361px)">
                <source srcset="/370-526/thumbs{{$post->avatar->file}}" media="(max-width: 400px)">
                <source srcset="/211-300/thumbs{{$post->avatar->file}}">
                <img width="211" height="300"
                     @if($posts->first() != $post)
                     loading="lazy"
                     @endif
                     title="Проститутка {{ $post->name }}"
                     srcset="/211-300/thumbs{{$post->avatar->file}}" alt="{{ $post->name }}">
            </picture>
        @endif
    </a>
    @if($post->video)
        <div class="video-stick">
            <img src="/img/video.svg" alt="Есть видео">
        </div>
    @endif
    <a href="/post/{{$post->url}}" class="name">{{$post->name}}</a>
    <div class="price">{{ $post->price }} ₽</div>
    @if($post->phone)
        <a data-tel="{{$post->phone}}" href="tel:+{{$post->phone}}" onclick="show_phone(this)" class="phone">Показать
            телефон</a>
    @else
        <a href="/post/{{$post->url}}" class="phone">Подробнее</a>
    @endif
</div>
