<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddClaimRequest;
use App\Models\Claim;
use Illuminate\Http\Request;

class ClaimController extends Controller
{
    public function index(AddClaimRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();

        if (Claim::create($data)) return back()->with('success', 'Ваше сообщение сохранено');

        return back()->with('error', 'Ошибка')->back();

    }
}
