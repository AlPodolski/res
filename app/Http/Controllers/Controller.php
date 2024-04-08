<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $limit;
    protected $sort;

    public function __construct()
    {
        $this->limit = \Cookie::get('post_limit') ?? 16;
        $this->sort = \Cookie::get('sort') ?? 'default';
    }
}
