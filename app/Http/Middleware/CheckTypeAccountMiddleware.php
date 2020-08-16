<?php

namespace App\Http\Middleware;

use Closure;

class CheckTypeAccountMiddleware
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
        if (auth()->user()->type == "stu"){
            return response()->json(["message" => "this account is not unauthorized"], 401);
        }
        return $next($request);
    }
}
