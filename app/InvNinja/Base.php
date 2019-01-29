<?php

namespace App\InvNinja;

class Base
{
    public static $API_URL = "https://invoice.greencoreelectric.com";
    public static $token = "kgz2io3ee6vviwo3egsbncxpbtsiyvhj";

    public static function sendRequest($url, $isPost = false, $data = null) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::$API_URL . $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "X-Ninja-Token: ".self::$token
        ));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        if ($isPost)
            curl_setopt($ch, CURLOPT_POST, true);

        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }
}
