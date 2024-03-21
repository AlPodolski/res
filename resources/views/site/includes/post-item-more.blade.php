<div class="col-4 more-post-item">
    <a href="/post/{{$post->url}}" class="d-block image-wrap">
        @if(isset($post->photo))
            <picture>

                <source srcset="/360-500/thumbs{{str_replace('.jpg', '.webp', $post->photo)}}" type="image/webp">
                <source srcset="/360-500/thumbs{{$post->photo }}" type="image/jpeg">

                <img
                    @if(!isset($posts) or $posts->first() != $post)
                        loading="lazy"
                    @endif
                    title="Проститутка {{ $post->name }}"
                    srcset="/360-500/thumbs{{$post->photo}}" alt="{{ $post->name }}">
            </picture>
        @endif
        @if($post->tarif_id)
            <div class="tarif tarif_{{ $post->tarif_id }}">
            </div>
        @endif
    </a>
    <a class="more-post-name" href="/post/{{$post->url}}">{{ $post->name }}</a>
    @if($metro = $post->metro->first())
        <div class="metro more-post-metro">
            <a href="/{{ $metro->metro->filterUrl->filter_url }}"
               class="metro-link">{{ $metro->metro->value }}</a>
        </div>
    @endif
</div>
