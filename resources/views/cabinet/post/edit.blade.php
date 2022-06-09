@extends('layouts.app')

@section('title', 'Кабинет')

@if(isset($path) and $path)
    @section('can', $path)
@endif

@php
    /* @var $post \App\Models\Post */
    /* @var $serviceList \App\Models\Service[] */
    /* @var $metroList \App\Models\Metro[] */
    /* @var $rayonList \App\Models\Rayon[] */
    /* @var $timeList \App\Models\Time[] */
@endphp
@section('maskedinput', '/js/jquery.maskedinput.js')
@section('content')

    <h1>Добавить анкету</h1>

    @if($errors)
        @foreach($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif

    <form action="/cabinet/post/{{ $post->id }}" enctype="multipart/form-data" method="post" class="d-flex"
          id="add-post-form">
        @csrf
        @method('PUT')
        <div class="form-group d-flex">
            <label for="name" class="col-form-label text-md-right">Имя</label>
            <input id="name" type="text"
                   class="form-control request-call-input @error('name') is-invalid @enderror"
                   name="name" required placeholder="Имя" value="{{ $post->name }}">
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
                   name="price" required value="{{ $post->price }}" placeholder="Цена за час">
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
                   name="rost" required value="{{ $post->rost }}" placeholder="Рост">
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
                   name="ves" value="{{ $post->ves }}" required placeholder="Вес">
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
                   name="age" value="{{ $post->age }}" required placeholder="Возраст">
            @error('age')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group d-flex">
            <label for="breast_size" class="col-form-label text-md-right">Размер груди</label>
            <input id="breast_size" type="text"
                   class="form-control request-call-input @error('breast_size') is-invalid @enderror"
                   name="breast_size" value="{{ $post->breast_size }}" required placeholder="Размер груди">
            @error('breast_size')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group d-flex">
            <label for="phone" class="col-form-label text-md-right">Номер телефона</label>
            <input id="phone" type="text"
                   class="form-control request-call-input @error('phone') is-invalid @enderror"
                   name="phone" required value="{{ $post->phone }}" placeholder="Номер телефона">
            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="col-12"></div>

        <div class="form-group d-flex">
            <label for="national_id" class="col-form-label text-md-right">Национальность</label>

            <select class="metro-select form-control" name="national_id" id="national_id">

                @foreach($nationalList as $item)

                    <option

                        @if($post->national->id == $item->id)
                            selected
                        @endif

                        value="{{ $item->id }}">{{ $item->value }}</option>

                @endforeach
            </select>
        </div>

        <div class="form-group d-flex">
            <label for="intim_hair_color_id" class="col-form-label text-md-right">Интимная стрижка</label>

            <select class="metro-select" name="intim_hair_color_id" id="intim_hair_color_id">

                @foreach($intimHairList as $item)

                    <option

                        @if($post->intimHair->id == $item->id)
                            selected
                        @endif

                        value="{{ $item->id }}">{{ $item->value }}</option>

                @endforeach
            </select>
        </div>


        <div class="form-group d-flex">
            <label for="hair_color_id" class="col-form-label text-md-right">Цвет волос</label>

            <select class="metro-select" name="hair_color_id" id="hair_color_id">

                @foreach($hairColorList as $item)

                    <option

                        @if($post->hair->id == $item->id)
                            selected
                        @endif

                        value="{{ $item->id }}">{{ $item->value }}</option>

                @endforeach

            </select>
        </div>

        <div class="col-12"></div>

        <div class="form-group d-flex">
            <label for="tarif_id" class="col-form-label text-md-right">Выбрать тариф</label>

            <select class="metro-select" name="tarif_id" id="tarif_id">

                @foreach($tarifList as $item)

                    <option value="{{ $item->id }}">{{ $item->value }} {{ $item->price }}р. в час</option>

                @endforeach
            </select>
        </div>


        <div class="col-12"></div>

        <div class="avatar">
            <label class="col-form-label text-md-right">Загрузить главное фото</label>
            <label for="addpost-image" id="cabinet-main-img-label"
                   style="background-image: url('/211-300/thumbs{{$post->avatar->file}}')"
                   class=" img-label no-img-bg main-img">

                <input name="avatar" type="file" id="addpost-image" required accept=".png, .jpg, .jpeg">

                <span class="plus-photo-wrap d-flex items-center" >

                    <span class="plus d-flex items-center">
                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M16.15 7.65H9.35005V0.849948C9.35005 0.38085 8.9692 0 8.49995 0C8.03085 0 7.65 0.38085 7.65 0.849948V7.65H0.849948C0.38085 7.65 0 8.03085 0 8.49995C0 8.9692 0.38085 9.35005 0.849948 9.35005H7.65V16.15C7.65 16.6192 8.03085 17.0001 8.49995 17.0001C8.9692 17.0001 9.35005 16.6192 9.35005 16.15V9.35005H16.15C16.6192 9.35005 17.0001 8.9692 17.0001 8.49995C17.0001 8.03085 16.6192 7.65 16.15 7.65Z"
                                fill="white"/>
                        </svg>
                    </span>
                </span>

            </label>
        </div>

        <div class="col-12"></div>

        <div class="gallery">

            <label class="col-form-label text-md-right bold-label">Загрузить фото в галерею</label>

            <div class="photo-wrap">
                <div class="popular-list post-photo " id="preview">
                    <div class="post-photo-item">
                        <label for="addpost-photo" class="img-label small-no-img-label">
                            <span class="no-img-bg small-no-img">
                            </span>
                        </label>
                    </div>
                </div>
            </div>

            <input name="gallery[]" required class="d-none" type="file" id="addpost-photo" multiple
                   accept=".png, .jpg, .jpeg">

        </div>

        <div class="check-box-group">
            <label class="col-form-label text-md-right">Выбрать услуги</label>
            @foreach($serviceList as $item)
                <div class="check-box-group-item">
                    <input type="checkbox" class="custom-checkbox" id="service-{{ $item->id }}" name="service[]"
                           @foreach($post->service as $dataItem)
                               @if($dataItem->service_id == $item->id)
                                   checked
                           @endif
                           @endforeach
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
                               value="{{ $item->id }}"

                               @if($post->rayon->rayons_id == $item->id)
                                   checked
                            @endif

                        >
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
                               @foreach($post->metro as $dataItem)
                                   @if($dataItem->metros_id == $item->id)
                                       checked
                               @endif
                               @endforeach
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
                           @foreach($post->time as $dataItem)
                               @if($dataItem->param_id == $item->id)
                                   checked
                           @endif
                           @endforeach
                           value="{{ $item->id }}">
                    <label for="time-{{ $item->id }}">{{ $item->value }}</label>
                </div>
            @endforeach
        </div>

        <div class="text-wrap form-group">
            <label for="about" class="col-form-label text-md-right bold-label">Описание</label>
            <textarea name="about" id="about" cols="30" rows="10">{{ $post->about }}</textarea>
        </div>

        <button type="submit" class="get-more-post-btn">
            Сохранить
        </button>

    </form>

@endsection
