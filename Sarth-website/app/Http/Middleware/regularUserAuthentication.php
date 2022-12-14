<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class regularUserAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        /*This middleware prevents only admin users from accessing the routes that are specified, guest users and regular signed in users are able to access these pages.*/
        if( auth()-> check() && auth()->user()->isadmin == true){
        
            return Redirect::back();
           
        }
        return $next($request);
    }
}
