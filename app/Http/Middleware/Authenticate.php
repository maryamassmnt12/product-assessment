<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Symfony\Component\HttpFoundation\Response;

class Authenticate extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function redirectTo(Request $request): ?string
    {
        if(! $request->expectsJson()) {
            if($request->is('admin/*')) {
                return route('admin.login');
            }

            if($request->is('customer/*')) {
                return route('customer.login');
            }

            return route('admin.login'); // fallback
        }
        return null;
    }
}

