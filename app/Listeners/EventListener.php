<?php

namespace App\Listeners;

use App\Events\Event;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Login;

use Session;

class EventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        Session::forget('switchaccount');
        if (Auth::User()->user_role != 'Admin') {
            Auth::User()->switch_account_id = null;
            Auth::User()->save();
        }
    }
}
