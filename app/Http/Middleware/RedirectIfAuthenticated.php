<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard) {
            case 'cashier':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('cashier.home');
                }
                break;
            case 'employee':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('employee.home');
                }
                break;
            default:
        }
        return $next($request);
    }
}
