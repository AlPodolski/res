<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCallRequest;
use App\Models\CallRequest;

class CallRequestController extends Controller
{
    public function index(AddCallRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->all();

        if ($item = (new CallRequest())->create($data)) return back()
            ->with(['success' => 'Заявка отправлена']);

        return back()
            ->withErrors(['msg' => 'Ошибка'])
            ->withInput();
    }
}
