<?php

namespace App\Services\CurlHttpClient;
use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\RequestInterface;
use GuzzleHttp\Promise\PromiseInterface;
use Exception;

class CurlHttpClientGuzzleAdaptor implements ClientInterface
{
    public function send(RequestInterface $request, array $options = []): ResponseInterface
    {
        throw new Exception('Don`t implements');
    }
    public function sendAsync(RequestInterface $request, array $options = []): PromiseInterface
    {
        throw new Exception('Don`t implements');
    }

    /**
     * @param string $method
     * @param $uri
     * @param array $options
     * @return ResponseInterface
     */
    public function request(string $method, $uri, array $options = []): ResponseInterface
    {
        $body = (new CurlHttpClient())->send($uri);
        $stream = new CurlHttpClientSteam($body);
        $response = new CurlHttpClientResponse();
        $response->withBody($stream);

        return $response;
    }
    public function requestAsync(string $method, $uri, array $options = []): PromiseInterface
    {
        throw new Exception('Don`t implements');
    }
    public function getConfig(string $option = null)
    {
        throw new Exception('Don`t implements');
    }
}
