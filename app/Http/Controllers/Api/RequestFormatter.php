<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestFormatter extends Controller
{
    public static function curl($urlTo = null, $data = null, $header)
    {
        // call api SSO
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $urlTo);
        curl_setopt($c, CURLOPT_POST, TRUE);
        curl_setopt($c, CURLOPT_HTTPHEADER, $header);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($c, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($c, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, 0);

        $res = curl_exec($c);
        if (curl_errno($c)) {
            return 'Curl error: ' . curl_error($c);
        }
        curl_close($c);
        $json = json_decode($res, true);
        return $json;
    }
}
