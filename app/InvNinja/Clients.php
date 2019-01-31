<?php

namespace App\InvNinja;

class Clients extends Base
{
    public static function getClientFromEmail($email) {
        return json_decode(self::sendRequest("/clients?email=$email"));
    }

    public static function addClient($client) {
        return json_decode(self::sendRequest("/clients", true, $client));
    }
}