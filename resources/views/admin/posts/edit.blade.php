@extends('layouts.admin')

@section('title', 'Редактировать анкету ' . $post->name)

@php
    /* @var $post \App\Models\Post */
    /* @var $serviceList \App\Models\Service[] */
    /* @var $metroList \App\Models\Metro[] */
    /* @var $rayonList \App\Models\Rayon[] */
    /* @var $timeList \App\Models\Time[] */
@endphp
@section('maskedinput', '/js/jquery.maskedinput.js')
@section('content')

    @include('admin.include.nav')

    <h1>Редактировать анкету</h1>

    @if($errors)
        @foreach($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif

    <form action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data" method="post" class="d-flex"
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
            <label for="tarif_id" class="col-form-label text-md-right">Выбрать тариф</label>

            <select class="metro-select" name="tarif_id" id="tarif_id">

                @foreach($tarifList as $item)

                    <option value="{{ $item->id }}">{{ $item->value }} {{ $item->price }}р. в час</option>

                @endforeach
            </select>
        </div>

        <div class="col-12"></div>

        <div class="form-group d-flex">
            <label for="check_photo_status" class="col-form-label text-md-right">Проверка фото</label>

            <select class="metro-select" name="check_photo_status" id="check_photo_status">
                <option  value="0">Фото не проверенно</option>
                <option @if($post->check_photo_status == 1) selected @endif value="1">Фото проверенно</option>
            </select>
        </div>

        <div class="col-12"></div>

        <div class="form-group d-flex">
            <label for="publication_status" class="col-form-label text-md-right">Статус</label>

            <select class="metro-select" name="publication_status" id="publication_status">
                <option value="0">Не публикуется</option>
                <option @if($post->publication_status == 1) selected @endif value="1">Публикуется</option>
                <option @if($post->publication_status == 2) selected @endif value="1">На модерации</option>
            </select>
        </div>

        <div class="col-12"></div>

        <div class="avatar">
            <label class="col-form-label text-md-right">Главное фото</label>
            <label for="addpost-image" id="cabinet-main-img-label"
                   style="background-image: url('/211-300/thumbs{{$post->photo}}')"
                   class=" img-label no-img-bg main-img">

            </label>
        </div>

        <div class="col-12"></div>

        <div class="gallery w-100">

            <label for="addpost-photo" class="col-form-label text-md-right bold-label">Фото в галерее</label>

            <div class="photo-wrap">

                <div class="popular-list post-photo">
                    @foreach($post->gallery as $item)
                        <div class="post-photo-item">
                            <label for="addpost-photo" class="img-label small-no-img-label">
                                <img src="/211-300/thumbs{{$item->file}}" alt="">
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

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
