@extends('layouts.admin')

@section('title', 'Анкеты')

@section('content')

    @include('admin.include.nav')

    <div class="control-panel">
        <div class="control-panel-item btn btn-success" onclick="check_all()">
            Одобрить все
        </div>
    </div>


    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Имя</th>
            <th scope="col">Фото</th>
            <th scope="col">Город</th>
            <th scope="col">Статус</th>
            <th scope="col">Удалить</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)

            @foreach($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>
                        <a target="_blank"
                           href="https://{{ $post->city->url }}.{{ env('DOMAIN') }}/post/{{ $post->url }}">
                            {{ $post->name }}
                        </a>
                    </td>
                    <td>
                        <a href="/admin/posts/{{ $post->id }}/edit">
                            @if(isset($post->avatar->file) and $post->avatar->file)
                                <img loading="lazy" src="/139-185/thumbs{{$post->avatar->file}}" alt="">
                            @endif
                        </a>
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
                    <td>
                        <div data-id="{{ $post->id }}" onclick="deletePost(this)" class="delete">Удалить</div>
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
