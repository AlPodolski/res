<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Http\Requests\PayRequest;
use App\Models\History;
use App\Models\Order;
use App\Models\UserChat;
use App\Repositories\CityRepository;
use App\Services\Obmenka;

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

        $history = Order::where('user_id', auth()->user()->id)->limit(50)->get();

        return view('cabinet.pay.index', compact('cityInfo', 'notReadMessage', 'history'));
    }

    public function processing($city, PayRequest $request, Obmenka $obmenka)
    {
        $data = $request->validated();

        $order = new Order();

        $order->user_id = auth()->id();
        $order->sum = $data['sum'];
        $order->status = Order::WAIT;

        if ($order->save()) {

            switch ($data['currency']) {

                case 1 :
                    $currency = 'qiwi';
                    break;

                case 2 :
                    $currency = 'visamaster.rur';
                    break;

                case 3 :
                    $currency = 'sbp.rub';
                    break;

                case 4 :
                    $currency = 'yandex';
                    break;

                case 5 :
                    $currency = 'usdt_trc20';
                    $data['sum'] = $data['sum'] / env('USDT_TRC20');
                    break;

            }


            if ($result = $obmenka->getPayUrl($order->id, $data['sum'], $city, $currency)) {

                return redirect($result->pay_link);

            }

            return back()->withErrors(['msg' => 'The Message']);

        }
    }
}
