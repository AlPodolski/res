@php
    /* @var $topListItem \App\Models\TopList */
@endphp
@if($topListItem->post->photo))
    <div class="popular-item post-photo-item">
        <a href="/post/{{ $topListItem->post->url }}">
            <picture>

                <source srcset="/139-185/thumbs{{str_replace('.jpg', '.webp', $topListItem->post->photo)}}"
                        media="(max-width: 361px)" type="image/webp">
                <source srcset="/139-185/thumbs{{$topListItem->post->photo}}"
                        media="(max-width: 361px)" type="image/jpeg">

                <source srcset="/370-526/thumbs{{str_replace('.jpg', '.webp', $topListItem->post->photo)}}"
                        media="(max-width: 400px)" type="image/webp">
                <source srcset="/370-526/thumbs{{$topListItem->post->photo}}"
                        media="(max-width: 400px)" type="image/jpeg">

                <source srcset="/370-526/thumbs{{str_replace('.jpg', '.webp', $topListItem->post->photo)}}"
                        media="(max-width: 400px)" type="image/webp">
                <source srcset="/370-526/thumbs{{$topListItem->post->photo}}"
                        media="(max-width: 400px)" type="image/jpeg">

                <source srcset="/163-238/thumbs{{str_replace('.jpg', '.webp', $topListItem->post->photo)}}"
                        type="image/webp">
                <source srcset="/163-238/thumbs{{$topListItem->post->photo}}" type="image/jpeg">

                <img width="163px" height="238px"
                     title="Проститутка {{ $topListItem->post->name }}"
                     @if(!isset($topList) or $topList->first() != $topListItem)
                         loading="lazy"
                     @endif
                     class="popular-img "
                     srcset="/163-238/thumbs{{$topListItem->post->photo}}"
                     alt="{{ $topListItem->post->name }}">
            </picture>
        </a>
    </div>
@endif
