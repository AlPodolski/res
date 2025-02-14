@php
    /* @var $post \App\Models\Post */
use App\Models\Post;
@endphp

<div class="ankets__item">
    <div class="ankets__item-header">
        <div class="ankets__item-moder"

        >
            <input type="checkbox" class="action-check" data-id="{{ $post->id }}">
            <span
                @if($post->publication_status == Post::POST_ON_PUBLICATION
                or $post->publication_status == Post::POST_DONT_PUBLICATION)
                    onclick="publication(this)"
                data-id="{{ $post->id }}"
            @endif
            >{{ $post->getPublication() }}</span>
        </div>

        <label for="avatar-{{ $post->id }}">
            <img src="/storage/{{ $post->photo }}" alt="" id="photo-{{ $post->id }}" class="ankets__item-img">

            <div class="update-photo">
                Сменить фото
            </div>
        </label>

        <input class="cabinet-listing-file"
               type="file"
               data-id="{{ $post->id }}"
               id="avatar-{{ $post->id }}"
               name="avatar"
               onchange="updateAvatar(this)"
               accept="image/png, image/jpeg" />

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
            </span><span class="post-phone" data-id="{{ $post->id }}">{{ $post->phone }}</span>
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

        <div href="#" class="ankets__item-phone ankets__item-phone-view">
            <svg>
                <use xlink:href='/svg/dest/stack/sprite.svg#phone'></use>
            </svg>
            Просмотров телефона {{ $post->phone_view_count }}
        </div>

        <div class="ankets__item-tarif-select">

            <select name="tarif" id="" class="nice-select" data-id="{{ $post->id }}" onchange="updateTarif(this)">
                @foreach($tarifList as $tarifItem)
                    <option @if($tarifItem->id == $post->tarif_id) selected @endif value="{{ $tarifItem->id }}">{{ $tarifItem->value }} - {{ $tarifItem->price }} р/час</option>
                @endforeach
            </select>

        </div>

        @if($post->publication_status != \App\Models\Post::POST_ON_MODERATION)
            <div onclick="upPost(this)" data-id="{{ $post->id }}" class="ankets__item-moder">Поднять анкету(70р)</div>
        @endif
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
