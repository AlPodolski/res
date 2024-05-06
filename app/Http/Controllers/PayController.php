<?php

namespace App\Http\Controllers;

use App\Events\PayEvent;
use App\Models\History;
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

                $sum = $orderInfo->accrual_amount;

                if ($orderInfo->currency == 'USDT_TRC20') $sum = $sum * env('USDT_TRC20');

                $sum = (int)$sum;

                $order->status = Order::FINISH;

                $order->save();

                $user->cash = $user->cash + $sum;

                $user->save();

                $payType = History::REPLENISHMENT_TYPE;

                event(new PayEvent($sum, $user->id, $payType, $user->cash ));

            }

        }
    }
}
