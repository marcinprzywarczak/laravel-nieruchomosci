<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class OnlyAjaxRequest
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
        if(!$request->ajax())
        {
            abort(403, 'Acces denied');
        }
        return $next($request);
    }
}
