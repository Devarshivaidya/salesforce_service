<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Salesmanager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->role == 'superadmin') 
        {
            return redirect()->route('superadmin.index');
        }
        else if (Auth::user()->role == 'salesmanager') 
        {           
            return $next($request);
        }

        else if (Auth::user()->role == 'salesmen') 
        {
            return redirect()->route('salesmen.index');      
        }
        else
        {
            return redirect()->route('home');
        }
    }
}
