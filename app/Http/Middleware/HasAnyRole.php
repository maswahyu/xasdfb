<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class HasAnyRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        // Return Not Authorized error, if user has not logged in
        if (!Auth::guard('admin')->check()) {
            return redirect('magic/login');
        }

        foreach ($roles as $role) {
            // if user has given role, continue processing the request
            if (Auth::guard('admin')->user()->hasRole($role)) {
                return $next($request);
            }
        }
        // user didn't have any of required roles, return Forbidden error
        abort(403);
    }
}
