<?php

namespace App\Services\CurlHttpClient;

use Psr\Http\Message\StreamInterface;
use Exception;
class CurlHttpClientSteam implements StreamInterface
{
    protected string $body;

    public function __construct(string $body)
    {
        $this->body = $body;
    }

    public function __toString(): string
    {
        throw new Exception('Don`t implements');
    }
    public function close(): void
    {
        throw new Exception('Don`t implements');
    }
    public function detach()
    {
        throw new Exception('Don`t implements');
    }
    public function getSize(): ?int
    {
        throw new Exception('Don`t implements');
    }
    public function tell(): int
    {
        throw new Exception('Don`t implements');
    }
    public function eof(): bool
    {
        throw new Exception('Don`t implements');
    }

    public function isSeekable(): bool
    {
        throw new Exception('Don`t implements');
    }
    public function seek(int $offset, int $whence = SEEK_SET): void
    {
        throw new Exception('Don`t implements');
    }
    public function rewind(): void
    {
        throw new Exception('Don`t implements');
    }
    public function isWritable(): bool
    {
        throw new Exception('Don`t implements');
    }
    public function write(string $string): int
    {
        throw new Exception('Don`t implements');
    }
    public function isReadable(): bool
    {
        throw new Exception('Don`t implements');
    }
    public function read(int $length): string
    {
        throw new Exception('Don`t implements');
    }

    public function getContents(): string
    {
        return $this->body;
    }

    public function getMetadata(?string $key = null)
    {
        throw new Exception('Don`t implements');
    }
}
