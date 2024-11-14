<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Curency;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Itstructure\GridView\DataProviders\EloquentDataProvider;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query();

        $dataProvider = new EloquentDataProvider($users);

        $gridData = [
            'dataProvider' => $dataProvider,
            'rowsPerPage' => 100,
            'columnFields' => [
                'id',
                [
                    'attribute' => 'name',
                    'label' => 'Сумма',
                ],
                [
                    'attribute' => 'email',
                    'label' => 'Почта',
                ],
                [
                    'attribute' => 'cash',
                    'label' => 'Баланс',
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

        return view('admin.user.index', compact('gridData'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
