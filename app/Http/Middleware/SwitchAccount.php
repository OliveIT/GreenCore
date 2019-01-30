<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use InvoiceNinja\Config as NinjaConfig;

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

        $API_URL = env("INVNINJA_URL", "https://invoice.greencoreelectric.com");
        $TOKEN = env("INVNINJA_TOKEN", "kgz2io3ee6vviwo3egsbncxpbtsiyvhj");

        NinjaConfig::setURL($API_URL);
        NinjaConfig::setToken($TOKEN);

        return $next($request);
    }
}