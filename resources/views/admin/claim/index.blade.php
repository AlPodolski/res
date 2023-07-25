@extends('layouts.admin')

@section('title', 'Жалобы')

@section('content')

    @include('admin.include.nav')

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Текст</th>
            <th scope="col">Почта</th>
            <th scope="col">Дата</th>
            <th scope="col">Удалить</th>
        </tr>
        </thead>
        <tbody>
        @if($claim)

            @foreach($claim as $post)
                @php
                    /* @var $post \App\Models\Claim */
                @endphp
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>
                        {{ $post->text }}
                    </td>
                    <td>
                        {{ $post->email }}
                    </td>
                    <td>
                        {{ $post->created_at }}
                    </td>
                    <td>
                        <div data-id="{{ $post->id }}"
                             onclick="deleteClaim(this)"
                             class="delete">Удалить</div>
                    </td>
                </tr>
            @endforeach

        @endif

        </tbody>
    </table>

    @if($claim->total() > $claim->count())

        {{ $claim->links() }}

    @endif

@endsection
