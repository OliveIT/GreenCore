<?php

namespace App\InvNinja;

class Payments extends Base
{
    public static function getPayments() {
        return json_decode(self::sendRequest("/payments"));
    }
}