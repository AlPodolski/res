@extends('layouts.cabinet')

@section('title', 'Кабинет')

@if(isset($path) and $path)
    @section('can', $path)
@endif

@php
    /* @var $serviceList \App\Models\Service[] */
    /* @var $metroList \App\Models\Metro[] */
    /* @var $rayonList \App\Models\Rayon[] */
    /* @var $timeList \App\Models\Time[] */
@endphp
@section('maskedinput', '/js/jquery.maskedinput.js')
@section('content')

    @include('cabinet.includes.sidebar')

    <main class="main col-lg-9">

        <h1>Добавить анкету</h1>

        @if($errors)
            @foreach($errors->all() as $error)
                {{$error}}
            @endforeach
        @endif

        <form action="/cabinet/post" enctype="multipart/form-data" method="post" class="anket"
              id="add-post-form">
            @csrf
            <div class="anket__main anket__block">
                <div class="anket__main-photo">
                    <button class="anket__main-photo-delete" tabindex>
                        <svg>
                            <use xlink:href='/svg/dest/stack/sprite.svg#cross'></use>
                        </svg>
                    </button>
                    <img class="anket__main-photo-img" data-placeholder="/images/graphics/user-placeholder.png"
                         alt="">
                    <div class="anket__main-photo-input">
                        <label for="anketPhoto" tabindex="0">+</label>
                        <input name="avatar" type="file" id="anketPhoto" accept=".jpg, .jpeg">
                    </div>
                </div>

                <div class="anket__main-info">

                    <div class="anket__main-info-item input-wrap">
                        <label for="anketName" class="@error('name') is-invalid @enderror">Имя</label>
                        <input type="text" name="name" class="anket__main-info-input input"
                               id="anketName" required>
                        @error('name')
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>

                    <div class="anket__main-info-item input-wrap">

                        <label for="anketAge" class="@error('age') is-invalid @enderror">Возраст</label>
                        <input type="text" name="age" class="anket__main-info-input input"
                               id="anketAge">
                        @error('age')
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror

                    </div>
                    <div class="anket__main-info-item input-wrap">

                        <label for="anketPrice" class="@error('price') is-invalid @enderror">Цена</label>
                        <input type="text" name="price" class="anket__main-info-input input"
                               id="anketPrice">
                        @error('price')
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror

                    </div>

                    <div class="anket__main-info-item input-wrap">

                        <label for="anketPhone" class="@error('phone') is-invalid @enderror">Телефон</label>
                        <input type="text" name="phone" class="anket__main-info-input input"
                               id="anketPhone">

                        @error('phone')

                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>

                        @enderror

                    </div>

                    <div class="anket__main-info-item input-wrap">

                        <label for="tarif_id" class="col-form-label text-md-right">Выбрать тариф</label>

                        <select class="metro-select n-select" name="tarif_id" id="tarif_id">

                            @foreach($tarifList as $item)

                                <option value="{{ $item->id }}">{{ $item->value }} {{ $item->price }}р. в час</option>

                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="anket__info">
                    <div class="anket__info-main">
                        <h2 class="anket__subtitle subtitle">
                            Параметры
                        </h2>
                        <div class="anket__info-params">
                            <div class="anket__info-params-col">
                                <div class="anket__info-params-item">
                                    <svg>
                                        <use xlink:href='/svg/dest/stack/sprite.svg#weight'></use>
                                    </svg>
                                    <div class="anket__info-params-input">

                                        <label class="@error('ves') is-invalid @enderror"
                                               for="anketWeight">Вес: </label>
                                        <input type="text" name="ves" id="anketWeight">


                                        @error('ves')

                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>

                                        @enderror

                                    </div>
                                </div>
                                <div class="anket__info-params-item">
                                    <svg>
                                        <use xlink:href='/svg/dest/stack/sprite.svg#bust'></use>
                                    </svg>
                                    <div class="anket__info-params-input">

                                        <label class="@error('breast_size') is-invalid @enderror"
                                               for="anketBust">Грудь: </label>
                                        <input type="text" name="breast_size" id="anketBust">

                                        @error('breast_size')

                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>

                                        @enderror

                                    </div>
                                </div>
                                <div class="anket__info-params-item">
                                    <svg>
                                        <use xlink:href='/svg/dest/stack/sprite.svg#sm'></use>
                                    </svg>
                                    <div class="anket__info-params-input">

                                        <label for="anketHeight"
                                               class="@error('rost') is-invalid @enderror">Рост:</label>
                                        <input type="text" name="rost" id="anketHeight">

                                        @error('rost')

                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>

                                        @enderror

                                    </div>
                                </div>
                            </div>
                            <div class="anket__info-params-col--select">
                                <div class="anket__info-params-item">
                                    <svg>
                                        <use xlink:href='/svg/dest/stack/sprite.svg#hair'></use>
                                    </svg>
                                    <div class="anket__info-params-input">
                                        <label for="anketHair">Волосы:</label>
                                        <select type="text" class="n-select" name="hair_color_id" id="anketHair">

                                            @foreach($hairColorList as $item)

                                                <option value="{{ $item->id }}">{{ $item->value }}</option>

                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="anket__info-params-item">
                                    <svg>
                                        <use xlink:href='/svg/dest/stack/sprite.svg#national'></use>
                                    </svg>
                                    <div class="anket__info-params-input">
                                        <label for="anketNational">Национальсность:</label>
                                        <select type="text" class="n-select" name="national_id" id="anketNational">
                                            @foreach($nationalList as $item)

                                                <option value="{{ $item->id }}">{{ $item->value }}</option>

                                            @endforeach
                                        </select>


                                    </div>
                                </div>
                                <div class="anket__info-params-item">
                                    <svg>
                                        <use xlink:href='/svg/dest/stack/sprite.svg#phair'></use>
                                    </svg>
                                    <div class="anket__info-params-input">
                                        <label for="anketPhair">Интим. стрижка:</label>
                                        <select class="n-select" type="text" name="intim_hair_color_id" id="anketPhair">
                                            @foreach($intimHairList as $item)

                                                <option value="{{ $item->id }}">{{ $item->value }}</option>

                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="anket__sidebar-adapt anket__sidebar-adapt--2"></div>
                        <h2 class="anket__subtitle subtitle">О себе:</h2>
                        <div class="anket__info-about">
                            <textarea name="about" placeholder="Расскажите о себе..."></textarea>
                        </div>
                        <h2 class="anket__subtitle subtitle">Местоположение:</h2>
                        <div class="anket__info-location">
                            <div class="anket__info-location-header">

                                <div class="anket__info-location-select" id="anketCityWrap">
                                    <label for="anketCity">Город:</label>
                                    <div class="anket__info-location-select-input">
                                        <select name="city_id" id="anketCity" class="n-select">

                                            @foreach($cityList as $item)

                                                @php
                                                    /* @var $item \App\Models\City */
                                                @endphp

                                                <option value="{{ $item->id }}">{{ $item->city }}</option>

                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                @if($rayonList->first())

                                    <div class="anket__info-location-select" id="anketRegionWrap">
                                        <label for="anketRegion">Район:</label>
                                        <div class="anket__info-location-select-input">
                                            <select class="n-select" name="rayon_id" id="anketRegion">

                                                @foreach($rayonList as $item)

                                                    @php
                                                        /* @var $item \App\Models\City */
                                                    @endphp

                                                    <option value="{{ $item->id }}">{{ $item->value }}</option>

                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="check-box-group">

                    <label class="col-form-label text-md-right">Выбрать услуги</label>
                    @foreach($serviceList as $item)
                        <div class="check-box-group-item">
                            <input type="checkbox" class="custom-checkbox" id="service-{{ $item->id }}" name="service[]"
                                   value="{{ $item->id }}">
                            <label for="service-{{ $item->id }}">{{ $item->value }}</label>
                        </div>
                    @endforeach

                </div>

                @if($metroList->first())

                    <div class="check-box-group">
                        <label class="col-form-label text-md-right">Выбрать метро</label>
                        @foreach($metroList as $item)
                            <div class="check-box-group-item">
                                <input type="checkbox" class="custom-checkbox" id="metro-{{ $item->id }}" name="metro[]"

                                       value="{{ $item->id }}">
                                <label for="metro-{{ $item->id }}">{{ $item->value }}</label>
                            </div>
                        @endforeach
                    </div>

                @endif

            </div>

            <div class="check-box-group">
                <label class="col-form-label text-md-right">Выбрать время встречи</label>
                @foreach($timeList as $item)
                    <div class="check-box-group-item">
                        <input type="checkbox" class="custom-checkbox" id="time-{{ $item->id }}" name="time[]"
                               value="{{ $item->id }}">
                        <label for="time-{{ $item->id }}">{{ $item->value }}</label>
                    </div>
                @endforeach
            </div>

            <div class="anket__photos">

                <ul class="anket__photos-titles">
                    <li class="anket__photos-titles-item active">
                        Фотографии
                    </li>
                </ul>

                <div class="anket__photos-content-item active">
                    <div class="anket__photos-content-input anket__photos-content-item-item">
                        <label for="anketPhotos">
                            <img src="/images/cam.png" alt="">
                            Загрузить фото
                        </label>

                        <input name="gallery[]" type="file" multiple id="anketPhotos" accept=".png, .jpg, .jpeg">

                    </div>

                </div>
            </div>

            <input id="add_more" type="checkbox" class="custom-checkbox" name="add_more" value="1">
            <label for="add_more">Добавить еще анкету</label>

            <button type="submit" class="anket__btns-btn anket__btns-save btn-main">
                Сохранить
            </button>
        </form>

    </main>

@endsection
