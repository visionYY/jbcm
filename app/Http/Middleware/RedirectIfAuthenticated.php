<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
//        dd($request);
        if (Auth::guard($guard)->check()) {
            switch ($guard){
                case 'admin':
                    $path = '/admin/login';
                    break;
                default:
                    $path = '/login';
                    break;
            }
//            $path = $guard ? '/admin' : '/home';
            return redirect($path);
        }
        return $next($request);
    }
}
