<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class UserSwitch extends Model
{
    public static function findCurrentSwitch() {
        print_r(Auth::User());
        exit();
    }
}
