@extends('layouts.admin')

@section('title', 'Комментарии')

@section('content')

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Текс</th>
            <th scope="col">Автор</th>
            <th scope="col">Статус</th>
        </tr>
        </thead>
        <tbody>
        @if($comments)

            @foreach($comments as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>
                        {{ $post->text }}
                    </td>
                    <td>
                        {{ $post->name }}
                    </td>
                    <td>
                        {{ $post->status }}
                    </td>
                </tr>
            @endforeach

        @endif

        </tbody>
    </table>

    @if($comments->total() > $comments->count())

        {{ $comments->links() }}

    @endif

@endsection
