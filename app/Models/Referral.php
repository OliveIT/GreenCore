<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    protected $table = 'referral';

    public static function getReffersById($id) {
        return DB::select("
        SELECT users.*
        FROM referral
        LEFT JOIN users ON(users.id = referral.refer_id)
        WHERE user_id = $id
        ");
    }

    public static function insert($user_id, $refer_id) {
        DB::table('referral')->insert([
            ['user_id' => $user_id, 'votes' => 0],
            ['refer_id' => $refer_id, 'votes' => 0],
        ]);
    }
}
