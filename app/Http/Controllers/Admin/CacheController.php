<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class CacheController extends Controller
{
    public function index()
    {
        \Cache::flush();

        return back()->withErrors(['msh' => 'Готово']);
    }
}
