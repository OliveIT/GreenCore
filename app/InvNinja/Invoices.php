<?php

namespace App\InvNinja;

class Invoices extends Base
{
    public static function getFromClientId($client_id) {
        return json_decode(self::sendRequest("/api/v1/invoices?client_id=$client_id"));
    }
}