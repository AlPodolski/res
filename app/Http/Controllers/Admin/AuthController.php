<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
/*       AdminUser::create(
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('12345678')
            ]
        );*/
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {

        $data = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        if (auth('admin')->attempt($data)){

            return redirect('/admin');

        }else{

            return redirect('/admin/login')->withErrors(['email' => 'Ошибка']);

        }

    }
}
