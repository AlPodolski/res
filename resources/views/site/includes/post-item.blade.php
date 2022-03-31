@php
    /* @var $post \App\Models\Post */
@endphp

<div class="post-item ">
    <a href="/post/{{$post->url}}" class="d-block">
        @if($post->avatar)
        <picture>
            <source srcset="/370-526/thumbs{{$post->avatar->file}}" media="(max-width: 400px)">
            <source srcset="/211-300/thumbs{{$post->avatar->file}}">
            <img loading="lazy" srcset="/211-300/thumbs{{$post->avatar->file}}" alt="{{ $post->name }}">
        </picture>
        @endif
    </a>
    <a href="/post/{{$post->url}}" class="name">{{$post->name}}</a>
    <div class="price">{{ $post->price }} ₽</div>
    <a data-tel="{{$post->phone}}" href="tel:+{{$post->phone}}" onclick="show_phone(this)" class="phone">Показать телефон</a>
</div>
