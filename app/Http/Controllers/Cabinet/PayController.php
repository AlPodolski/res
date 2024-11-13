<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Http\Requests\PayRequest;
use App\Models\Curency;
use App\Models\Order;
use App\Models\UserChat;
use App\Repositories\CityRepository;
use App\Services\Pay\PaymentFactory;

class PayController extends Controller
{

    public $cityRepository;

    public function __construct()
    {
        $this->cityRepository = new CityRepository();

        parent::__construct();
    }

    public function index($city)
    {
        $cityInfo = $this->cityRepository->getCityInfoByUrl($city);
        $notReadMessage = UserChat::where('user_id', auth()->user()->id)->with('notRead')->first();

        $currency = Curency::all();

        $history = Order::where('user_id', auth()->user()->id)->limit(50)->get();

        return view('cabinet.pay.index', compact('cityInfo', 'notReadMessage', 'history', 'currency'));
    }

    public function processing($city, PayRequest $request)
    {
        $data = $request->validated();

        $currency = Curency::where('value', $data['currency'] )->first();

        $order = new Order();

        $order->user_id = auth()->id();
        $order->sum = $data['sum'];
        $order->status = Order::WAIT;
        $order->payment_system = $currency->payment_system;

        if ($order->save()) {

            if ($currency->value == 'usdt_trc20'){

                $data['sum'] = $data['sum'] / env('USDT_TRC20');

            }

            $payService = PaymentFactory::create($currency->payment_system);

            if ($payLink = $payService->getPayUrl($order->id, $data['sum'], $city, $data['currency'])) {

                return redirect($payLink);

            }

            return back()->withErrors(['msg' => 'The Message']);

        }
    }
}
