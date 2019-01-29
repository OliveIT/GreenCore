<?php

namespace App\InvNinja;

class Clients extends Base
{
    public static function getClientFromEmail($email) {
        return json_decode(self::sendRequest("/api/v1/clients?email=$email"));
    }
}