<?php

namespace App\Services\GeoCoder\GeoCoder;


interface GeoCoderInterface
{
    public function setExcludePlaceIds(array $ids = []);
    public function getExcludePlaceIds(): array;
    public function getPlaces(string $searchStr): array;

}