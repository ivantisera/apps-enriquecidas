<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;


use Closure;

class AdminAuthentication
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request. CHequea que el usuario sea admin
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        {
            if ($this->auth->check()) {
                if ($this->auth->user()->is_admin == 1) {
                    return $next($request);
                }
            }
            return redirect('home');
        }
    }
}
