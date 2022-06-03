@extends('layouts.app')

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

@section('content')

    <h1>Добавить анкету</h1>

    <form action="/cabinet/post/create" method="post" class="d-flex" id="add-post-form">
        @csrf
        <div class="form-group d-flex">
            <label for="name" class="col-form-label text-md-right">Имя</label>
            <input id="name" type="text"
                   class="form-control request-call-input @error('name') is-invalid @enderror"
                   name="name" required placeholder="Имя">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group d-flex">
            <label for="price" class="col-form-label text-md-right">Цена за час</label>
            <input id="price" type="text"
                   class="form-control request-call-input @error('price') is-invalid @enderror"
                   name="phone" required placeholder="Цена за час">
            @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group d-flex">
            <label for="rost" class="col-form-label text-md-right">Рост</label>
            <input id="rost" type="text"
                   class="form-control request-call-input @error('rost') is-invalid @enderror"
                   name="phone" required placeholder="Рост">
            @error('rost')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group d-flex">
            <label for="ves" class="col-form-label text-md-right">Вес</label>
            <input id="ves" type="text"
                   class="form-control request-call-input @error('ves') is-invalid @enderror"
                   name="phone" required placeholder="Вес">
            @error('ves')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group d-flex">
            <label for="age" class="col-form-label text-md-right">Возраст</label>
            <input id="age" type="text"
                   class="form-control request-call-input @error('age') is-invalid @enderror"
                   name="age" required placeholder="Возраст">
            @error('ves')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group d-flex">
            <label for="breast_size" class="col-form-label text-md-right">Размер груди</label>
            <input id="breast_size" type="text"
                   class="form-control request-call-input @error('breast_size') is-invalid @enderror"
                   name="breast_size" required placeholder="Размер груди">
            @error('ves')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group d-flex">
            <label for="phone" class="col-form-label text-md-right">Номер телефона</label>
            <input id="phone" type="text"
                   class="form-control request-call-input @error('phone') is-invalid @enderror"
                   name="phone" required placeholder="Номер телефона">
            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group d-flex">
            <label for="national_id" class="col-form-label text-md-right">Национальность</label>

            <select class="metro-select form-control" name="national_id" id="national_id">

                @foreach($nationalList as $item)

                    <option value="{{ $item->id }}">{{ $item->value }}</option>

                @endforeach
            </select>
        </div>

        <div class="form-group d-flex">
            <label for="intim_hair_color_id" class="col-form-label text-md-right">Интимная стрижка</label>

            <select class="metro-select" name="intim_hair_color_id" id="intim_hair_color_id">

                @foreach($intimHairList as $item)

                    <option value="{{ $item->id }}">{{ $item->value }}</option>

                @endforeach
            </select>
        </div>

        <div class="form-group d-flex">
            <label for="hair_color_id" class="col-form-label text-md-right">Цвет волос</label>

            <select class="metro-select" name="hair_color_id" id="hair_color_id">

                @foreach($hairColorList as $item)

                    <option value="{{ $item->id }}">{{ $item->value }}</option>

                @endforeach

            </select>
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

        @if($rayonList->first())

            <div class="check-box-group">
                <label class="col-form-label text-md-right">Выбрать район</label>
                @foreach($rayonList as $item)
                    <div class="check-box-group-item">
                        <input type="checkbox" class="custom-checkbox" id="rayon-{{ $item->id }}" name="rayon[]"
                               value="{{ $item->id }}">
                        <label for="rayon-{{ $item->id }}">{{ $item->value }}</label>
                    </div>
                @endforeach
            </div>

        @endif

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

        <div class="text-wrap form-group">
            <label for="about" class="col-form-label text-md-right">Описание</label>
            <textarea name="about" id="about" cols="30" rows="10">

            </textarea>
        </div>

    </form>

@endsection
