@extends('layouts.app')

@section('title', '404')
@section('des', '404')

@section('content')

    <ul class="breadcrumb">
        <li class="breadcrumb-item home">
            <a class="breadcrumb-link" title="Главная" href="/">Главная</a>
        </li>
        <li class="breadcrumb-item" data-breadcrumbs="2">
            404
        </li>
    </ul>

    <h1>404</h1>

    @widget('menu', ['city_id' =>  ''  ])

@endsection
