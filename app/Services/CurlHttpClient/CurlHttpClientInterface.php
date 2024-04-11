<?php

namespace App\Services\CurlHttpClient;

interface CurlHttpClientInterface
{
    public function send(string $url);
}
