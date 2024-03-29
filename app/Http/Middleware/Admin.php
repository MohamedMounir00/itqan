<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class Admin
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
        if (auth()->user()->admins) {
            return $next($request);
        } else {
            Auth::logout();
            session()->flash('success', 'ليس لديك صلاحيه الدخول');

            return redirect('/login');

        }


    }
    }
