<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RobotController extends Controller
{
    public function index($city, Request $request)
    {
        return response()->view('robot.index', ['host' => $request->getHttpHost()])
            ->header('Content-Type', 'text/plain; charset=UTF-8');
    }
}
