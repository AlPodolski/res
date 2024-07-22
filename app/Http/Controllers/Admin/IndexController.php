<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PayCashDay;

class IndexController extends Controller
{
    public function index()
    {

        $spisaniya = PayCashDay::limit(7)->orderByDesc('id')->get();

        return view('admin.index.index', compact('spisaniya'));
    }
}
