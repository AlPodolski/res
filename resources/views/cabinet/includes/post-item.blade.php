@php
    /* @var $post \App\Models\Post */
@endphp

<div class="post-item position-relative">
    <a href="/post/{{$post->url}}" class="d-block image-wrap">
        @if(isset($post->avatar->file))
            <picture>
                <source srcset="/314-441/thumbs{{$post->avatar->file}}"
                        media="(max-width: 361px)">
                <source srcset="/370-526/thumbs{{$post->avatar->file}}" media="(max-width: 400px)">
                <source srcset="/211-300/thumbs{{$post->avatar->file}}">
                <img width="211" height="300"
                     @if(!isset($posts) or $posts->first() != $post)
                     loading="lazy"
                     @endif
                     title="Проститутка {{ $post->name }}"
                     srcset="/211-300/thumbs{{$post->avatar->file}}" alt="{{ $post->name }}">
            </picture>
        @endif
    </a>
    <a href="/post/{{$post->url}}" class="name">Редактировать</a>
    <form onsubmit="return sendDeleteForm(this)" action="cabinet/post/{{ $post->id }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="name">Удалить</button>
    </form>
    <div class="price">{{ $post->name }}</div>
    <a data-tel="{{$post->phone}}" href="tel:+{{$post->phone}}" class="phone">{{ $post->phone }}</a>
</div>
