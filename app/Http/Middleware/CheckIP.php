<?php
namespace App\Http\Middleware;

use Closure;

class CheckIP {
    public function handle($request, Closure $next) {
        if ( !in_array($request->getClientIp(), [
            '127.0.0.1',
        ]) ) {
            return response('已限定IP!', 503);
        }

        return $next($request);
    }
}