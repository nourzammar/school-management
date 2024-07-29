<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        if(!empty(Auth::check()))
        {
            if(!empty(Auth::user()->user_type ==1))
            {
                return $next($request);
            }
            else
        {
            Auth::logout();
            return redirect(url(''));
        }
        }
        else
        {
            Auth::logout();
            return redirect(url(''));
        }
        
    }
}
