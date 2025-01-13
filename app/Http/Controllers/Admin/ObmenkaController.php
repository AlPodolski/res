<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Curency;
use App\Models\Order;
use Carbon\Carbon;
use Itstructure\GridView\DataProviders\EloquentDataProvider;

class ObmenkaController extends Controller
{
    public function index()
    {
        $orders = Order::query();

        $dataProvider = new EloquentDataProvider($orders);

        $gridData = [
            'dataProvider' => $dataProvider,
            'rowsPerPage' => 100,
            'columnFields' => [
                [
                    'attribute' => 'id',
                    'label' => 'id',
                    'format' => 'html',
                    'value' => function ($row) {
                        /* @var $row Order */
                        return '<span onclick="copyDataText(this)" data-text="' . $row->id . '-rex" >' . $row->id . '</span>';
                    }
                ],
                [
                    'attribute' => 'sum',
                    'label' => 'Сумма',
                ],
                [
                    'attribute' => 'user_id',
                    'label' => 'id Польз.',
                ],
                [
                    'attribute' => 'status',
                    'label' => 'Статус(1,2)',
                    'format' => 'html',
                    'value' => function ($row) {
                        /* @var $row Order */

                        if ($row->status == Order::WAIT) return 'Ожидает оплаты';
                        if ($row->status == Order::FINISH) return 'Подтвержден';

                    }
                ],
                [
                    'attribute' => 'payment_system',
                    'label' => 'Способ оплаты',
                    'format' => 'html',
                    'value' => function ($row) {
                        /* @var $row Order */

                        if ($row->payment_system == Curency::OBMENKA_PAY_SYSTEM) return 'Обменка';
                        if ($row->payment_system == Curency::BETA_PAY_SYSTEM) return 'Бета';

                    }
                ],
                [
                    'attribute' => 'created_at',
                    'label' => 'Создан',
                ],
                [
                    'attribute' => 'updated_at',
                    'label' => 'Обновлен',
                ],
            ]
        ];

        $monthCount = Order::where('created_at', '>=', Carbon::now()->format('Y-m') . '-01')
            ->where('status', Order::FINISH)
            ->sum('sum');

        $startPeriod = Carbon::now()->subDay(7)->format('Y-m-d');

        $weekPay = array();

        while ($startPeriod < Carbon::now()->format('Y-m-d')) {

            $startPeriod = Carbon::parse($startPeriod)->addDay(1)->format('Y-m-d');

            $weekPay[$startPeriod] = Order::where('created_at', 'like', '%' . $startPeriod . '%')
                ->where('status', Order::FINISH)
                ->sum('sum');

        }

        return view('admin.obmenka.index', compact('dataProvider', 'gridData', 'monthCount', 'weekPay'));
    }

    public function user($id)
    {
        $orders = Order::orderByDesc('id')->where('user_id', $id)->paginate(40);

        return view('admin.obmenka.index', compact('orders'));
    }

}
