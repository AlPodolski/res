@extends('layouts.new_public')
@section('title', 'Войти')
@section('des', 'Войти')
@section('content')
    <div class="col-12">
        <form method="POST" class="login-form" action="/login" >
            <h1>Войти</h1>
            @csrf

            <div class="form-group">
                <label for="email"
                       class=" col-form-label text-md-right">Почта</label>

                <input id="email" type="email" class="text-input request-call-input @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="form-group ">
                <label for="password"
                       class=" col-form-label text-md-right">Пароль</label>

                <input id="password" type="password"
                       class="text-input request-call-input @error('password') is-invalid @enderror" name="password"
                       required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <script defer src='https://www.google.com/recaptcha/api.js'></script>

            <div id="register_recapcha" class="g-recaptcha" data-sitekey="6Lffq2EkAAAAAK4PuAXJjhnE1NOP1uUjANyEUxe_"></div>

            <div class="form-group">
                <a href="/register" id="toLogin" class="cabinet_link ">Регистрация</a>
            </div>

            <div class="form-group ">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember"
                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        Запомнить меня
                    </label>
                </div>
            </div>

            <div class="form-group row mb-0">

                <button type="submit" class="review-btn">
                    Авторизация
                </button>

            </div>

        </form>
    </div>
@endsection
