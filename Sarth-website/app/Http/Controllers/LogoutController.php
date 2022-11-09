<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    //
    public function logout(Request $request)
    {
        auth() -> logout();
        return redirect('products');
        Session()->flush();
    }
}
