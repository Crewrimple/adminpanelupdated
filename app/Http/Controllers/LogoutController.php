<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function showLogout()
    {
        return view('logout'); 
    }

    public function logout()
{
    auth()->logout(); 
    return redirect()->route('login'); 
}

}
