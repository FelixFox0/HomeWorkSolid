<?php

namespace App\Services\CurlHttpClient;

class CurlHttpClient implements CurlHttpClientInterface
{
    public function send(string $url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);

        return $output;

    }
}
