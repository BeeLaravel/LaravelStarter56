<?php
namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware {
    protected $except = [
    ];

    public function handle($request, \Closure $next) {
        // return parent::handle($request, $next);
        return parent::addCookieToResponse($request, $next($request));
        
        // return $next($request);
    }
}
