<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminAuthenticated
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
        if (Auth::check() && Auth::user()->getRole->roleInfo->name == 'Admin'){
        	return $next($request);
        } else {
            Auth::logout();
            return  response()->json([
                'status'    => false,
                'error'     => 'User dont have permission to access this section'
            ], 400);
        }
	}

}
