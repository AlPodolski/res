@extends('layouts.app')

@section('title', 'Кабинет')

@if(isset($path) and $path)
    @section('can', $path)
@endif

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
    </form>

@endsection
