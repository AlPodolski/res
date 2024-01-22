<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
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
                'id',
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
                    'attribute' => 'created_at',
                    'label' => 'Создан',
                ],
                [
                    'attribute' => 'updated_at',
                    'label' => 'Обновлен',
                ],
            ]
        ];

        return view('admin.obmenka.index', compact('dataProvider', 'gridData'));
    }

    public function user($id)
    {
        $orders = Order::orderByDesc('id')->where('user_id', $id)->paginate(40);

        return view('admin.obmenka.index', compact('orders'));
    }

}
