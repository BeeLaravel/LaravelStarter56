<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate {
    public function handle($request, Closure $next, $guard=null) {
        if ( Auth::guard($guard)->guest() ) {
            if ( $request->ajax() ) {
                return response('Unauthorized.', 401);
            } else {
                switch ( $guard ) {
                    case 'admin':
                        $path = 'admin/login';
                    break;
                    break;
                    default:
                        $path = 'user/login';
                    break;
                }

                return redirect()->guest($path);
            }
        }

        return $next($request);
    }
}