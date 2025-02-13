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
                <div class="fast-link-item ankets__item-moder" onclick="get_phone_modal(this)">Изменить номер на анкетах</div>
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

        <div class="modal fade" id="phoneModal" tabindex="-1" role="dialog" aria-labelledby="phoneModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-close-wrap">
                        <svg data-bs-dismiss="modal" aria-label="Close" width="34" height="34" viewBox="0 0 34 34" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M29.0282 4.97991C22.399 -1.64923 11.6092 -1.64923 4.98005 4.97991C1.76888 8.19234 0 12.4625 0 17.0039C0 21.5454 1.76888 25.8155 4.98005 29.0267C8.29529 32.3419 12.6497 33.9989 17.0041 33.9989C21.3585 33.9989 25.713 32.3419 29.0281 29.0267C35.6573 22.3976 35.6573 11.6103 29.0282 4.97991ZM27.1657 27.1643C21.5627 32.7673 12.4455 32.7673 6.84243 27.1643C4.12918 24.451 2.63423 20.8421 2.63423 17.0039C2.63423 13.1658 4.12918 9.55687 6.84243 6.84229C12.4455 1.23921 21.5627 1.24054 27.1657 6.84229C32.7675 12.4454 32.7675 21.5625 27.1657 27.1643Z"
                                  fill="#0F2C93"/>
                            <path d="M22.6797 20.6411L18.9509 16.9176L22.6797 13.1941C23.1933 12.6804 23.1933 11.8467 22.681 11.3316C22.166 10.8153 21.3323 10.8166 20.8173 11.3303L17.0859 15.0564L13.3545 11.3303C12.8395 10.8166 12.0058 10.8153 11.4908 11.3316C10.9771 11.8466 10.9771 12.6803 11.4921 13.1941L15.2209 16.9176L11.4921 20.6411C10.9771 21.1547 10.9771 21.9885 11.4908 22.5035C11.7477 22.7616 12.0861 22.8894 12.4233 22.8894C12.7606 22.8894 13.0977 22.7603 13.3546 22.5048L17.086 18.7786L20.8174 22.5048C21.0742 22.7616 21.4114 22.8894 21.7486 22.8894C22.0858 22.8894 22.4243 22.7603 22.6811 22.5035C23.1947 21.9885 23.1947 21.1547 22.6797 20.6411Z"
                                  fill="#0F2C93"/>
                        </svg>
                    </div>
                    <div class="modal-body phone-modal-body">
                        <div class="claim__modal">
                            <p class="phone-heading">Введите новый номер</p>
                            <div class="form-group field-posts-phone required">
                                <input type="text" id="posts-phone-update"
                                       class="form-control" name="phone" value="">
                            </div>
                        </div>
                        <div class="btn btn-success d-block" onclick="updatePhone(this)">Изменить</div>
                    </div>
                </div>
            </div>
        </div>

    </main>

@endsection
