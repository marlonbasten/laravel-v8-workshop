<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DatabaseSelectMiddleware
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
        if ($secret = 'test') {
            config()->set('database.default', 'user_1_db');
        }
        return $next($request);
    }
}
