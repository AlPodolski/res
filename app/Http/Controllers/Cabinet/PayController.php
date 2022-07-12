<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Http\Requests\PayRequest;
use App\Models\Order;
use App\Services\Obmenka;

class PayController extends Controller
{
    public function index()
    {
        return view('cabinet.pay.index');
    }

    public function processing($city, PayRequest $request, Obmenka $obmenka)
    {
        $data = $request->validated();

        $order = new Order();

        $order->user_id = auth()->id();
        $order->sum = $data['sum'];
        $order->status = Order::WAIT;

        if ($order->save()){

            switch ($data['currency']){

                case 1 : $currency = 'qiwi';
                break;

                case 2 : $currency = 'visamaster.rur';
                break;

            }


            if ($result = $obmenka->getPayUrl($order->id, $data['sum'], $city, $currency)){

                return redirect($result->pay_link);

            }

            return back()->withErrors(['msg' => 'The Message']);

        }
    }
}
