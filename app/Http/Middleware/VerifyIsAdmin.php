<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class VerifyIsAdmin
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
        if (auth()->user()->role !== User::USER_ADMIN){
            return redirect()->route('home');
        }
        return $next($request);
    }
}
