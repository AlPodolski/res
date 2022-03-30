@if($posts)

    @foreach($posts as $post)

        @php
            /* @var $post \App\Models\Post */
        @endphp

        @include('site.includes.post-item')

    @endforeach

@endif
