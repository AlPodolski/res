@extends('layouts.app')

@section('title', 'Анкеты')

@section('content')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Имя</th>
            <th scope="col">Фото</th>
            <th scope="col">Город</th>
            <th scope="col">Статус</th>
        </tr>
        </thead>
        <tbody >
        @if($posts)

            @foreach($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>
                        <a target="_blank" href="https://{{ $post->city->url }}.{{ env('DOMAIN') }}/post/{{ $post->url }}">
                            {{ $post->name }}
                        </a>
                    </td>
                    <td>
                        @if(isset($post->avatar->file) and $post->avatar->file)
                            <img loading="lazy" src="/139-185/thumbs{{$post->avatar->file}}" alt="">
                        @endif
                    </td>
                    <td>{{ $post->city->city }}</td>
                    <td>
                        @if($post->publication_status == \App\Models\Post::POST_DONT_PUBLICATION)
                            Не публикуется
                        @endif
                        @if($post->publication_status == \App\Models\Post::POST_ON_PUBLICATION)
                            Публикуется
                        @endif
                        @if($post->publication_status == \App\Models\Post::POST_ON_MODERATION)
                            <div class="check"
                                 data-url="/admin/posts/check"
                                 onclick="check(this)" data-id="{{ $post->id }}">
                                Подтвердить
                            </div>
                        @endif
                    </td>
                </tr>
            @endforeach

        @endif

        </tbody>
    </table>

    @if($posts->total() > $posts->count())

        {{ $posts->links() }}

    @endif

@endsection
