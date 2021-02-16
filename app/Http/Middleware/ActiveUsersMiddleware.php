<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ActiveUsersMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->status != 1) {
            auth()->logout();
            return redirect()->route('login')
                ->withErrors([ 'email' => 'هذا الحساب مغلق , يرجى التواصل مع الادمن' ]);
        }
        return $next($request);
    }
}
