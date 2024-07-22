@extends('layouts.admin')

@section('title', 'Администратор')

@section('content')
    @include('admin.include.nav')
    @if($spisaniya)
        @foreach($spisaniya as $item)
            {{ $item->date }} - {{ $item->sum }} <br>
        @endforeach
    @endif
@endsection
