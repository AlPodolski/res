@extends('layouts.admin')

@section('title', 'Комментарии')

@section('content')

    @include('admin.include.nav')

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Имя</th>
            <th scope="col">Почта</th>
            <th scope="col">Счет</th>
            <th scope="col">Создан</th>
            <th scope="col">Удалить</th>
        </tr>
        </thead>
        <tbody>
        @if($users)

            @foreach($users as $post)
                @php
                    /* @var $user \App\Models\User */
                @endphp
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>
                        {{ $post->name }}
                    </td>
                    <td>
                        {{ $post->email }}
                    </td>
                    <td>
                        {{ $post->cash }}
                    </td>
                    <td>
                        {{ $post->created_at }}
                    </td>

                    <td>
                        <div data-id="{{ $post->id }}"
                             onclick="deleteComment1(this)"
                             class="delete">Удалить</div>
                    </td>
                </tr>
            @endforeach

        @endif

        </tbody>
    </table>

    @if($users->total() > $users->count())

        {{ $users->links() }}

    @endif

@endsection
