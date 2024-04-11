<?php

namespace App\Services\ContentHttpClient;

class ContentHttpClient implements ContentHttpClientInterface
{
    public function getContent(string $url)
    {
        return file_get_contents($url);
    }
}
