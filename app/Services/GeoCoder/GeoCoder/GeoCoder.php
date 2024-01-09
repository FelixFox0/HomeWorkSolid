<?php

namespace App\Services\GeoCoder\GeoCoder;

use GuzzleHttp\ClientInterface;

class GeoCoder implements GeoCoderInterface
{
    protected const METHOD = 'GET';

    protected ClientInterface $httpClient;
    protected string $url;
    protected array $excludePlaceIds = [];

    public function __construct(ClientInterface $httpClient, string $url)
    {
        $this->httpClient = $httpClient;
        $this->url = $url;
    }

    public function setExcludePlaceIds(array $ids = [])
    {
        $this->excludePlaceIds = $ids ;

        return $this;
    }
    public function getExcludePlaceIds(): array
    {
        return $this->excludePlaceIds ;
    }

    public function getPlaces(string $searchStr): array
    {
        $response = $this->httpClient->request(
            static::METHOD,
            $this->url . $searchStr . '&exclude_place_ids=' . urlencode(implode(',', $this->excludePlaceIds))
        );
        $places = json_decode($response->getBody()->getContents());

        return $places;
    }


}