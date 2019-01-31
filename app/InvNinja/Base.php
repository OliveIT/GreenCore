<?php

namespace App\InvNinja;

class Base
{
    public static function sendRequest($url, $isPost = false, $data = null) {
        $API_URL = env("INVNINJA_URL", "https://invoice.greencoreelectric.com/api/v1");
        $TOKEN = env("INVNINJA_TOKEN", "kgz2io3ee6vviwo3egsbncxpbtsiyvhj");

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $API_URL . $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);

        if ($isPost) {
            $payload = json_encode($data);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "X-Ninja-Token: $TOKEN",
                'Content-Type: application/json',
                'Content-Length: ' . strlen($payload)
            ));
        } else {
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "X-Ninja-Token: $TOKEN",
            ));
        }

        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }
}
