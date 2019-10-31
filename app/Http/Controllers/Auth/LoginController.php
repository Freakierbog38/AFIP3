<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    // Se sobreescribe esta función que es la que muestra la vista del login
    public function showLoginForm()
    {
        return view('/login');
    }
}
