<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Session::has('loginId') && $request->path() != 'auth.login') {
            return redirect()->route('auth.index')->with('fail', 'You must be logged in.');
        } elseif (Session::has('loginId') && $request->path() == 'auth.login') {
            return redirect()->route('std.index');
        }
        
        return $next($request);
    }
}