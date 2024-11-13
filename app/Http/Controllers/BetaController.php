<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class BetaController extends Controller
{
    public function index(Request $request)
    {
        $orderId = $request->post('orderId');
        $amount = $request->post('amount');
        $status = $request->post('status');

        $orderId = str_replace('-rex', '', $orderId);

        $order = Order::where('id',$orderId )->where('status', Order::WAIT)->first();

        if ($order and ($status == 'success' or $status == 'partial_payment')){

            $user = User::where('id', $order->user_id)->first();

            $order->status = Order::FINISH;

            $user->cash = $user->cash + $amount;

            $user->save();

            $order->save();

        }
    }
}
