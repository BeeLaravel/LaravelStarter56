<?php

namespace App\Http\Middleware;

use Closure;

class CheckIP
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
        if ( !in_array($request->getClientIp(), [
            '127.0.0.1', // 本地
            '36.7.137.10', // 10 楼
            '36.7.137.4', // 12 楼
            '36.7.179.141', // 壹美尚
        ]) ) {
            return response('已限定IP!', 503);
        }

        return $next($request);
    }
}