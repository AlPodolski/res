<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function __invoke(Request $request)
    {
        $phone = $request->post('phone');
        $userId = $request->post('user_id');

        $phone = preg_replace('/[^0-9]/', '', $phone);

        Post::where('user_id', $userId)->update(['phone' => $phone]);

    }
}
