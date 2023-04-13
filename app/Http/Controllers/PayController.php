<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Services\Obmenka;

class PayController extends Controller
{
    public function index($city, $id, Obmenka $obmenka)
    {
        $order = Order::findOrFail($id);

        if ($order and $order->status == Order::WAIT and $user = User::find($order->user_id)){

            $orderInfo = $obmenka->getOrderInfo($order->id.'-rex');

            if (isset($orderInfo->amount) and $orderInfo->status == 'FINISHED') {

                $order->status = Order::FINISH;

                $order->save();

                $user->cash = $user->cash + $order->sum;

                $user->save();

            }

        }
    }
}
