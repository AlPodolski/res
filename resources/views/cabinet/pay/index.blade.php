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
            <p><strong>Сейчас есть проблемы с оплатой, если не получилось оплатить попробуйте другой способ, оплата
                    в USDT должна работать</strong></p>

            <div class="ammount__info-balance">
                <h2 class="ammount__info-balance-title">
                    Баланс
                </h2>
                <div class="ammount__info-balance-value">
                    {{ auth()->user()->cash }}
                </div>
                <div class="ammount__info-balance-descr">
                    Пополните счет любым удобным для вас споссбом
                </div>
            </div>
            <form class="ammount__info-balance-repl" action="/cabinet/pay/processing" method="post">
                @csrf
                <label for="balanceReplCur">Введите сумму пополнения:</label>
                <div class="ammount__info-balance-repl-input-wrap">
                        <span data-val="1000">
                            <input class="ammount__info-balance-repl-input" type="text" id="balanceReplCur" name="sum"
                                   value="1000"
                                   oninput="this.parentElement.setAttribute('data-val',  this.value)"
                            >
                        </span>

                </div>
                <p><strong>USDT TRC20, При оплате USDT курс конвертации 1 USDT
                        = <span class="red">
                            {{ env('USDT_TRC20') }}
                        руб.</span> </strong>
                </p>
                <div class="ammount__info-balance-repl-label">
                    Выберите способ оплаты:
                </div>

                <div class="ammount__info-balance-repl-radio-items-wrap">

                    @php
                    $firstCurrency = $currency->first()
                    @endphp

                    @foreach($currency as $item)

                        <div class="ammount__info-balance-repl-radio-items">
                            <div class="ammount__info-balance-repl-radio-item">
                                <input type="radio" name="currency" value="{{ $item->value }}"
                                       id="balanceRepl{{ $item->value }}"
                                       class="ammount__info-balance-repl-radio-input"
                                       @if($firstCurrency == $item) checked @endif>
                                <label for="balanceReplUSDT">
                                    {{ $item->name }}
                                </label>
                            </div>
                        </div>

                    @endforeach

                </div>

                <script defer src='https://www.google.com/recaptcha/api.js'></script>

                <div id="register_recapcha" class="g-recaptcha"
                     data-sitekey="6Lffq2EkAAAAAK4PuAXJjhnE1NOP1uUjANyEUxe_"></div>

                <button class="ammount__info-balance-repl-btn btn-main">Оплатить</button>
            </form>
        </div>

        @if($history->first())
            <h2 class="ammount__info-balance-title">
                Платежи
            </h2>
            <table class="table  table-bordered   table-striped   table-hover   table-sm ">
                <tr>
                    <th>ID</th>
                    <th>Сумма</th>
                    <th>Статус</th>
                    <th>Создан</th>
                    <th>Зачислен</th>
                </tr>

                @foreach($history as $item)
                    <tr>
                        <th>{{ $item->id }}</th>
                        <th>{{ $item->sum }}</th>
                        <th>{{ $item->payStatus }}</th>
                        <th>{{ $item->created_at }}</th>
                        <th>
                            @if($item->created_at != $item->updated_at)
                                {{ $item->updated_at }}
                            @else
                                -
                            @endif
                        </th>
                    </tr>
                @endforeach

            </table>
        @endif

    </main>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

@endsection
