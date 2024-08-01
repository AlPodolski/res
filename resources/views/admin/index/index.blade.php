@extends('layouts.admin')

@section('title', 'Администратор')

@section('content')
    @include('admin.include.nav')
    <div class="col-12">
        <p>Спасания</p>
        @if($spisaniya)
            @foreach($spisaniya as $item)
                {{ $item->date }} - {{ $item->sum }} <br>
            @endforeach
        @endif
    </div>
    <div class="col-12">
        <p>Блокировки</p>
        @if($cityBlock)
            @foreach($cityBlock as $item)
                {{ $item->old_city }} - {{ $item->new_city }} - {{ $item->created_at }}<br>
            @endforeach
        @endif
    </div>
@endsection
