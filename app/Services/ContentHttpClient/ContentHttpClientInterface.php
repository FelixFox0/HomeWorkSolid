<?php

namespace App\Services\ContentHttpClient;

interface ContentHttpClientInterface
{
    public function getContent(string $url);
}
