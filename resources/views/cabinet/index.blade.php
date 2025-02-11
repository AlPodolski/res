@extends('layouts.cabinet')

@section('title', 'Кабинет')

@php
    /* @var $postsList \App\Models\Post[] */
@endphp

@if(isset($path) and $path)
    @section('can', $path)
@endif

@section('content')

    @include('cabinet.includes.sidebar')

    <main class="main col-lg-9">

        <h1>Кабинет</h1>

        @if($postsList->count())
            <div class="fast-links">
                <div class="fast-link-item ankets__item-moder" onclick="start_all(this)">Включить все анкеты</div>
                <span onclick="set_all_selected(this)" class="ankets__item-moder">Выбрать все</span>
            </div>

            <div class="all-actions-wrap">

                <div class="update_tarif-wrap">
                    <label for="update_tarif">Сменить тариф на выбранных анкетах</label>
                    <select name="update_tarif" class="update_tarif" id="update_tarif" disabled>
                        @foreach($tarifList as $tarif)
                            <option value="{{ $tarif->id }}">{{ $tarif->value }} - {{ $tarif->price }} р/час</option>
                        @endforeach
                    </select>
                </div>

            </div>

        @endif

        <div class="ankets__items">

            @if(isset($postsList) and $postsList)
                @foreach($postsList as $post)
                    @include('cabinet.includes.post-item')
                @endforeach
            @endif

        </div>

    </main>

@endsection
