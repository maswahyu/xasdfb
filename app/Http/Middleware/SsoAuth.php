<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class SsoAuth
{
    protected $cas;

    public function __construct()
    {
        $this->cas = app('cas');
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (! $this->cas->isAuthenticated()) { 
            if (Auth::check()) {
                Auth::logout();
            }
        }

        return $next($request);
    }
}