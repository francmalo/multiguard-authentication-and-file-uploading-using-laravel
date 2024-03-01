<?php

 namespace App\Http\Middleware;


// use Symfony\Component\HttpFoundation\Response;



use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response; // Use the correct namespace for Response
use Illuminate\Support\Facades\Auth; // Use the correct namespace for Auth

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next):Response
    {

        if (false == Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }
        return $next($request);
    }
}
