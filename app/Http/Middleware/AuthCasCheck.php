<?php

namespace App\Http\Middleware;

use App\User;
use Auth;
use Closure;
use Hash;

class AuthCasCheck
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
        if (Auth::check()) {
            if (! $this->cas->isAuthenticated()) { 
                Auth::logout();
            }
        } else {
            if ($this->cas->isAuthenticated()) {
                $email = $this->cas->user();
                $attribute = $this->cas->getAttributes();
                $user = User::where('email', $email)->first();
                if (! $user) {
                    $user = new User();
                    $user->email = $email;
                    $user->password = Hash::make($email . now());
                    if ($attribute) {
                        if (array_key_exists('FIRST_NAME', $attribute)) {
                            $user->name = $attribute['FIRST_NAME'];
                        }
                        if (array_key_exists('ID', $attribute)) {
                            $user->sso_id = $attribute['ID'];
                        }
                        if (array_key_exists('NO_KTP', $attribute)) {
                            $user->no_ktp = $attribute['NO_KTP'];
                        }
                    }   
                    $user->save();
                }

                Auth::loginUsingId($user->id);
            } else {
                $this->cas->authenticate();
            }
        }

        return $next($request);
    }
}
