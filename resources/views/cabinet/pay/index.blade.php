@extends('layouts.app')

@section('title', 'Баланс')

@section('content')

    <h1>Баланс</h1>

    @if($errors)
        @foreach($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif

    <div class="balance-wrap d-flex">
        <div class="balance-card">
            <div class="white-bold-text">Баланс</div>
            <div class=" big-white-text margin-top-20">{{ auth()->user()->cash }}р.</div>
        </div>

        <div class="pay-form-wrap">

            <form id="pay-form" class="form-horizontal" action="/cabinet/pay/processing" method="post">
                @csrf
                <div class="form-group field-obmenkapayform-sum">

                    <label class="control-label" for="obmenkapayform-sum">Сумма (минимум 300)</label>
                    <input type="text" id="obmenkapayform-sum" class="form-control" name="sum" value="500"
                           aria-required="true">
                </div>

                <div class="form-group field-obmenkapayform-currency required">
                    <label class="control-label">Выбрать способ оплаты</label>
                    <div id="obmenkapayform-currency" role="radiogroup" aria-required="true">
                        <div>
                            <input checked="" id="qiwi_label-id" type="radio" name="currency" value="1"
                                   tabindex="0">
                            <label for="qiwi_label-id" class="modal-radio qiwi_label image-label-radio">Киви</label>
                        </div>
                        <div>
                            <input id="visa_master_label-id" type="radio" name="currency" value="2"
                                   tabindex="1">
                            <label for="visa_master_label-id"
                                   class="modal-radio visa_master_label image-label-radio">Карта</label>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <button type="submit" class="orange-btn d-block">Отправить</button>
                </div>

            </form>
        </div>

    </div>

    @widget('menu', ['city_id' =>  $cityInfo['id']  ])

@endsection
