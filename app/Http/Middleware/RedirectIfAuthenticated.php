<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
    // public function handle($request, Closure $next, $guard = null)
    // {
    //     if (Auth::guard($guard)->check()) {
    //         return redirect()->route('student.home');
    //     }

    //     return $next($request);
    // }

public function handle(Request $request, Closure $next, ...$guards)
{
    $guards = empty($guards) ? [null] : $guards;

    foreach ($guards as $guard) {
        if (Auth::guard($guard)->check()) {

            if($guard === 'admin'){
                return redirect()->route('admin.home');
            }
            if($guard === 'student'){
                return redirect()->route('student.home');
            }
            return redirect()->route('/');
            // return redirect(RouteServiceProvider::HOME);
        }
    }

    return $next($request);
}
}
