<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    //
    public function logout(Request $request)
    {
        //Logs user out through the auth function
        auth() -> logout();
        //Deletes the session after the user logs out.
        $request->session()->flush();
        return redirect('products');

    }
}
