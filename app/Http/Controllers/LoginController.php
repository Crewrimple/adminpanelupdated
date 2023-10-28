<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        if (request()->isMethod('GET')) {
            return view('pages.login');
        }

        if (auth()->attempt(['name' => $request->username, 'password' => $request->password])) {
            return redirect()->route('home');
        }
        

        return back()->with('error', 'Неправильное имя пользователя или пароль');
    }
}
