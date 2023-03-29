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
            <th scope="col">Удалить</th>
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
                        @if($post->status == \App\Models\Comment::MODERATION_STATUS)
                            <div data-id="{{ $post->id }}"
                                 data-url="/admin/comments/check"
                                 onclick="checkComment(this)" class="delete">Подтвердить</div>
                        @else
                            Подтверждено
                        @endif
                    </td>
                    <td>
                        <div data-id="{{ $post->id }}"
                             onclick="deleteComment(this)"
                             class="delete">Удалить</div>
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
