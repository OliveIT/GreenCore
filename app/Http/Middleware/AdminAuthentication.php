<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use InvoiceNinja\Config as NinjaConfig;
use Session;

class AdminAuthentication
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
        if (Auth::User()->user_role == "Admin") {
            Session::put("adminaccount", Auth::User());
        } else if (Session::get("adminaccount") != null
            && Session::get("adminaccount")->user_role == "Admin") {
        } else {
            return redirect('/');
        }

        $API_URL = env("INVNINJA_URL", "https://invoice.greencoreelectric.com/api/v1");
        $TOKEN = env("INVNINJA_TOKEN", "kgz2io3ee6vviwo3egsbncxpbtsiyvhj");

        NinjaConfig::setURL($API_URL);
        NinjaConfig::setToken($TOKEN);

        return $next($request);
    }
}