<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class SwitchAccount extends Model
{
    protected $table = 'switchaccount';

    public static function findCurrentSwitch() {
        $userId = Auth::User()->id;
        $list = SwitchAccount::where("user_id", $userId)->get();
        return $list;
    }
}
