<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class adminAuthentication
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
        
        /*This middleware prevents guest users and regular users from accessing admin pages
        Guest users are redirected to the login pages so that they can login if they have an admin account
        Regular users are redirected back to the page that were on before trying to access the admin routes.*/
        if( !auth()-> check()){
            return redirect('login');
        } elseif (auth()->user()->isadmin != true){
            return Redirect::back();

    
            

        }

        
        return $next($request);


        
    }
}
