<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class ObmenkaController extends Controller
{
    public function index()
    {

        $orders = Order::orderByDesc('id')->paginate(40);

        return view('admin.obmenka.index', compact('orders'));
    }
}
