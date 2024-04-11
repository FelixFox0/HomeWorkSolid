<?php

namespace App\Services\CurlHttpClient;

use Psr\Http\Message\MessageInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Exception;

class CurlHttpClientResponse implements ResponseInterface
{
    protected StreamInterface $stream;
    public function getStatusCode(): int
    {
        throw new Exception('Don`t implements');
    }

    public function withStatus(int $code, string $reasonPhrase = ''): ResponseInterface
    {
        throw new Exception('Don`t implements');
    }

    public function getReasonPhrase(): string
    {
        throw new Exception('Don`t implements');
    }

    public function getProtocolVersion(): string
    {
        throw new Exception('Don`t implements');
    }

    public function withProtocolVersion(string $version): MessageInterface
    {
        throw new Exception('Don`t implements');
    }

    public function getHeaders(): array
    {

    }

    public function hasHeader(string $name): bool
    {
        throw new Exception('Don`t implements');
    }

    public function getHeader(string $name): array
    {
        throw new Exception('Don`t implements');
    }

    public function getHeaderLine(string $name): string
    {
        throw new Exception('Don`t implements');
    }

    public function withHeader(string $name, $value): MessageInterface
    {
        throw new Exception('Don`t implements');
    }

    public function withAddedHeader(string $name, $value): MessageInterface
    {

    }

    public function withoutHeader(string $name): MessageInterface
    {
        throw new Exception('Don`t implements');
    }

    public function getBody(): StreamInterface
    {
        return $this->stream;
    }

    public function withBody(StreamInterface $body): MessageInterface
    {
        $this->stream = $body;

        return $this;
    }
}
