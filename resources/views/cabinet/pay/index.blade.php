@extends('layouts.cabinet')

@section('title', 'Баланс')

@section('content')

    @include('cabinet.includes.sidebar')

    <main class="ammount main col-lg-9">

        <h1>Баланс</h1>

        @if($errors)
            @foreach($errors->all() as $error)
                <div class="error">{{$error}}</div>
            @endforeach
        @endif

        <div class="ammount__info ammount__block">
            <div class="ammount__info-balance">
                <h2 class="ammount__info-balance-title">
                    Баланс
                </h2>
                <div class="ammount__info-balance-value">
                    0
                </div>
                <div class="ammount__info-balance-descr">
                    Пополните счет любым удобным для вас споссбом
                </div>
            </div>
            <form class="ammount__info-balance-repl" action="/cabinet/pay/processing" method="post">
                @csrf
                <label for="balanceReplCur">Введите сумму пополнения:</label>
                <div class="ammount__info-balance-repl-input-wrap">
                        <span data-val="500">
                            <input class="ammount__info-balance-repl-input" type="text" id="balanceReplCur" name="sum" value="500"
                                   oninput="this.parentElement.setAttribute('data-val',  this.value)"
                            >
                        </span>

                </div>
                <div class="ammount__info-balance-repl-label">
                    Выберите способ оплаты:
                </div>
                <div class="ammount__info-balance-repl-radio-items">
                    <div class="ammount__info-balance-repl-radio-item">
                        <input type="radio" name="currency" value="1" id="balanceReplQiwi" class="ammount__info-balance-repl-radio-input" checked>
                        <label for="balanceReplQiwi">
                            Киви
                        </label>
                    </div>
                    <div class="ammount__info-balance-repl-radio-item">
                        <input type="radio" name="currency" value="2" id="balanceReplVisaMastercard" class="ammount__info-balance-repl-radio-input">
                        <label for="balanceReplVisaMastercard">
                            Карта
                        </label>
                    </div>
                    <div class="ammount__info-balance-repl-radio-item">
                        <input type="radio" name="currency" value="3" id="balanceReplSBP" class="ammount__info-balance-repl-radio-input">
                        <label for="balanceReplSBP">
                            СБП
                        </label>
                    </div>
                    <div class="ammount__info-balance-repl-radio-item">
                        <input type="radio" name="currency" value="4" id="balanceReplyandex" class="ammount__info-balance-repl-radio-input">
                        <label for="balanceReplyandex">
                            ЮМАНИ
                        </label>
                    </div>
                </div>

                <script defer src='https://www.google.com/recaptcha/api.js'></script>

                <div id="register_recapcha" class="g-recaptcha"
                     data-sitekey="6Lffq2EkAAAAAK4PuAXJjhnE1NOP1uUjANyEUxe_"></div>

                <button class="ammount__info-balance-repl-btn btn-main">Оплатить</button>
            </form>
        </div>

    </main>

@endsection
