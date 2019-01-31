<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use InvoiceNinja\Config as NinjaConfig;
use Route;
use Session;

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
            && !Session::get("switchaccount")) {
            return redirect('switch');
        }

        $API_URL = env("INVNINJA_URL", "https://invoice.greencoreelectric.com/api/v1");
        $TOKEN = env("INVNINJA_TOKEN", "kgz2io3ee6vviwo3egsbncxpbtsiyvhj");

        NinjaConfig::setURL($API_URL);
        NinjaConfig::setToken($TOKEN);

        $url = Route::current()->uri;
        if (Auth::User()->user_role == "Admin"
            && substr($url, 0, 4) != "user") {
            return redirect('user/view');
        }
        return $next($request);
    }
}