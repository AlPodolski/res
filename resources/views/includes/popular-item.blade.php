@php
    /* @var $topListItem \App\Models\TopList */
@endphp
<div class="popular-item post-photo-item">
    <a href="/post/{{ $topListItem->post->url }}">
        <picture>

            <source srcset="/139-185/thumbs{{str_replace('.jpg', '.webp', $topListItem->post->avatar->file)}}"
                    media="(max-width: 361px)" type="image/webp">
            <source srcset="/139-185/thumbs{{$topListItem->post->avatar->file}}"
                    media="(max-width: 361px)" type="image/jpeg">

            <source srcset="/370-526/thumbs{{str_replace('.jpg', '.webp', $topListItem->post->avatar->file)}}"
                    media="(max-width: 400px)" type="image/webp">
            <source srcset="/370-526/thumbs{{$topListItem->post->avatar->file}}"
                    media="(max-width: 400px)" type="image/jpeg">

            <source srcset="/370-526/thumbs{{str_replace('.jpg', '.webp', $topListItem->post->avatar->file)}}"
                    media="(max-width: 400px)" type="image/webp">
            <source srcset="/370-526/thumbs{{$topListItem->post->avatar->file}}"
                    media="(max-width: 400px)" type="image/jpeg">

            <source srcset="/163-238/thumbs{{str_replace('.jpg', '.webp', $topListItem->post->avatar->file)}}" type="image/webp">
            <source srcset="/163-238/thumbs{{$topListItem->post->avatar->file}}" type="image/jpeg">

            <img width="163px" height="238px"
                 title="Проститутка {{ $topListItem->post->name }}" loading="lazy"
                 class="popular-img "
                 srcset="/163-238/thumbs{{$topListItem->post->avatar->file}}"
                 alt="{{ $topListItem->post->name }}">
        </picture>
    </a>
</div>
