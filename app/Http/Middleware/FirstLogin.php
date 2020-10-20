<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class FirstLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        if (Auth::check())
        {
            if(auth()->user()->primer_ingreso == 0){
            return redirect('/confirmation');
            }
        }
         return $next($request);
    
    }
}