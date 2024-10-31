<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlockDomain;
use App\Models\CityBlock;
use App\Models\PayCashDay;

class IndexController extends Controller
{
    public function index()
    {

        $spisaniya = PayCashDay::limit(7)->orderByDesc('id')->get();

         $cityBlock = CityBlock::get();

         $blockDomains = BlockDomain::get();

        return view('admin.index.index', compact('spisaniya', 'cityBlock', 'blockDomains'));
    }
}
