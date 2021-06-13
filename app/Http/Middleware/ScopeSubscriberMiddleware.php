<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ScopeSubscriberMiddleware
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
        if(!$request->user()->tokenCan('subscriber')) {
            abort(401, 'unathorized');
        }

        return $next($request);
    }
}
