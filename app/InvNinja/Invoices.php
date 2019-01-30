<?php

namespace App\InvNinja;

class Invoices extends Base
{
    public static function getFromClientId($client_id) {
        return json_decode(self::sendRequest("/invoices?client_id=$client_id"));
    }

    public static function getFromId($id) {
        return json_decode(self::sendRequest("/invoices/$id"));
    }
}