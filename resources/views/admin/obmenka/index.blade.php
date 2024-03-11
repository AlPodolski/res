@extends('layouts.admin')

@section('title', 'Оплата')

@section('content')

    @include('admin.include.nav')

    <p>За месяц {{ $monthCount }}</p>

    @gridView($gridData)

@endsection
