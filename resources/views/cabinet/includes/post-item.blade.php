@php
    /* @var $post \App\Models\Post */
use App\Models\Post;
@endphp

<div class="ankets__item">
    <div class="ankets__item-header">
        <div class="ankets__item-moder"
             @if($post->publication_status == Post::POST_ON_PUBLICATION
            or $post->publication_status == Post::POST_DONT_PUBLICATION)
                 onclick="publication(this)"
                data-id="{{ $post->id }}"
            @endif
        >
            {{ $post->getPublication() }}
        </div>
        <picture>
            <source srcset="/314-441/thumbs{{$post->avatar->file}}"
                    media="(max-width: 361px)">
            <source srcset="/370-526/thumbs{{$post->avatar->file}}" media="(max-width: 400px)">
            <source srcset="/211-300/thumbs{{$post->avatar->file}}">
            <img
                class="ankets__item-img"
                @if(!isset($posts) or $posts->first() != $post)
                    loading="lazy"
                @endif
                title="Проститутка {{ $post->name }}"
                srcset="/211-300/thumbs{{$post->avatar->file}}" alt="{{ $post->name }}">
        </picture>

    </div>
    <div class="ankets__item-body">
        <div class="ankets__item-field ankets__item-title">
            <h3 class="ankets__item-title-text">
                {{ $post->name }}
            </h3>
            <svg>
                <use xlink:href='/svg/dest/stack/sprite.svg#verif'></use>
            </svg>
        </div>
        <a href="#" class="ankets__item-phone">
            <span>
                <svg>
                    <use xlink:href='/svg/dest/stack/sprite.svg#phone'></use>
                </svg>
            </span><span>{{ $post->phone }}</span>
        </a>
        <div class="ankets__item-locallist locallist">
            <a class="ankets__item-locallist-item locallist__item">
                <span>
                    <svg>
                        <use xlink:href='/svg/dest/stack/sprite.svg#location'></use>
                    </svg>
                </span>
                <span>{{ $post->city->city }}</span>
            </a>
        </div>
        <div class="ankets__item-field ankets__item-ui">
            <a class="ankets__item-ui-item ankets__item-ui-item--1" href="/cabinet/post/{{$post->id}}/edit">
                <svg>
                    <use xlink:href='/svg/dest/stack/sprite.svg#pencil'></use>
                </svg>
            </a>
            <form onsubmit="return sendDeleteForm(this)" action="/cabinet/post/{{ $post->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="ankets__item-ui-item ankets__item-ui-item--3" class="name">
                    <svg>
                        <use xlink:href='/svg/dest/stack/sprite.svg#trash'></use>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>

@if(false)

@endif
