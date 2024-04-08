@extends('layouts.new_public')
@section('title', 'Регистрация')
@section('content')
    <div class="col-12">
        <form method="POST" class="login-form" action="/register">
            <h1>Регистрация</h1>
            @csrf

            <div class="form-group">
                <label for="name" class="col-form-label text-md-right">Имя</label>

                <input id="name" type="text"
                       class="text-input request-call-input @error('name') is-invalid @enderror"
                       name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="form-group ">
                <label for="email" class="col-form-label text-md-right">Почта</label>

                <input id="email" type="email"
                       class="text-input request-call-input @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="form-group ">
                <label for="password" class="col-form-label text-md-right">Пароль</label>

                <input id="password" type="password"
                       class="text-input request-call-input @error('password') is-invalid @enderror"
                       name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password-confirm" class="col-form-label text-md-right">Повторите
                    пароль</label>

                <input id="password-confirm" type="password" class="text-input request-call-input"
                       name="password_confirmation" required autocomplete="new-password">

            </div>

            <script defer src='https://www.google.com/recaptcha/api.js'></script>

            <div id="register_recapcha" class="g-recaptcha" data-sitekey="6Lffq2EkAAAAAK4PuAXJjhnE1NOP1uUjANyEUxe_"></div>

            <div class="form-group">
                <a href="/login" id="toLogin" class="cabinet_link">Авторизация</a>
            </div>

            <div class="form-group row mb-0">
                <button type="submit" class="review-btn">
                    Регистрация
                </button>
            </div>
        </form>
    </div>
@endsection
