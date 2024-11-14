@extends('layouts.admin')

@section('title', 'Комментарии')

@section('content')

    @include('admin.include.nav')

    @gridView($gridData)

@endsection
