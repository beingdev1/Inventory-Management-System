<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
    }
    public function handle($request, \Closure $next)
    {
        if (Auth::user()) {
            if (Auth::user()->role == '1')
                return $next($request);
            else
                return redirect()->route('forbidden');
        } else {
            // forbideen template
            return redirect()->route('forbidden');
            return $next($request);
        }
        return $next($request);
    }
}
