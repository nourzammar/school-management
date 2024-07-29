<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class StudentlMiddleware
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
            if(!empty(Auth::user()->user_type ==3))
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
