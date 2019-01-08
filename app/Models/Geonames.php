<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Geonames extends Model
{
    protected $table = 'geonames';

    public static function getStates() {
        return DB::select('SELECT state FROM geonames GROUP BY state');
    }
}
