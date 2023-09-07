@extends('layouts.app')

@section('title', 'Оплата')

@section('content')

    @include('admin.include.nav')

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Сумма</th>
            <th scope="col">ID Пользователя</th>
            <th scope="col">Статус</th>
            <th scope="col">Дата</th>
        </tr>
        </thead>
        <tbody>
        @if($orders)

            @foreach($orders as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>
                        {{ $post->sum }}
                    </td>
                    <td>
                        {{ $post->user_id }}
                    </td>
                    <td>

                        @if($post->status == \App\Models\Order::WAIT)
                            Ожидает оплаты
                        @endif

                        @if($post->status == \App\Models\Order::FINISH)
                            Оплачен
                        @endif

                    </td>

                    <td>
                        {{ $post->created_at }}
                    </td>

                </tr>
            @endforeach



        @endif

        </tbody>
    </table>

    @if($orders->total() > $orders->count())

        {{ $orders->links('vendor.pagination.bootstrap-4') }}

    @endif

@endsection
