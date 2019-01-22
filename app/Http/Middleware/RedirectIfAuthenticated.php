<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated { // guest
    public function handle($request, Closure $next, $guard=null) {
        if ( Auth::guard($guard)->check() ) {
            switch ( $guard ) {
                case 'admin':
                    $url = "/admin/categories";
                break;
                case 'backend':
                    $url = "/backend/links";
                break;
                case 'office':
                    $url = "/office/";
                break;
                default:
                    $url = "/";
                break;
            }
            
            return redirect($url);
        }

        return $next($request);
    }
}
