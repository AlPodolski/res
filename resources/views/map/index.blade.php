@extends('layouts.app')

@php
    /* @var $posts \Illuminate\Pagination\LengthAwarePaginator */
@endphp

@section('title', $meta['title'])
@section('des', $meta['des'] )

@if(isset($cityInfo['city']))
    @section('city', $cityInfo['city'])
@endif

@section('content')

    @include('includes.message')

    @include('includes.filter')

    @isset($filterParams)
        <ul class="breadcrumb">
            <li class="breadcrumb-item home">
                <a class="breadcrumb-link" title="Главная" href="/">Главная</a>
            </li>
            <li class="breadcrumb-item" data-breadcrumbs="2">
                {{ $meta['h1'] }}
            </li>
        </ul>
        @widget('labelMenu', ['filterParams' => $filterParams])

    @endif

    <div class="total-h1-wrap d-flex">
        <h1 class="big-bold-text">{{ $meta['h1'] }}</h1>
    </div>

    <div class="map-data d-none">
        {!! json_encode($posts) !!}
    </div>
    <div class="posts-wrap">
        <div id="map">
            <img src="/img/spinner.gif" alt="">
        </div>
    </div>

    @widget('menu', ['city_id' =>  $cityInfo['id']])

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button onclick="closeModal(this)" type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                <div class="modal-body">
                    <img class="preload-img" src="/img/preload.gif" alt="">
                </div>
            </div>
        </div>
    </div>

    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU"></script>
    <script src="{{ asset('js/map.js?v=3') }}"></script>

@endsection
