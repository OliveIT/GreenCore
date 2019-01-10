<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SwitchAccount
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
        if (Auth::User()->user_role != "Admin"
            && Auth::User()
            && !Auth::User()->switch_account_id) {
            return redirect('switch');
        }

        return $next($request);
    }
}