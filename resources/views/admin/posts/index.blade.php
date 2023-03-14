@extends('layouts.app')

@section('title', 'Анкеты')

@section('content')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Имя</th>
            <th scope="col">Фото</th>
            <th scope="col">Город</th>
            <th scope="col">Статус</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)

            @foreach($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>
                        <a target="_blank" href="/post/{{ $post->url }}">{{ $post->name }}</a>
                    </td>
                    <td>
                        @if(isset($post->avatar->file) and $post->avatar->file)
                            <img loading="lazy" src="/139-185/thumbs{{$post->avatar->file}}" alt="">
                        @endif
                    </td>
                    <td>{{ $post->city_id }}</td>
                    <td>{{ $post->publication_status }}</td>
                </tr>
            @endforeach

        @endif

        </tbody>
    </table>

    @if($posts->total() > $posts->count())

        {{ $posts->links() }}

    @endif

@endsection
