@extends('layouts.admin')

@section('title', 'Оплата')

@section('content')

    @include('admin.include.nav')

    @gridView($gridData)

@endsection
