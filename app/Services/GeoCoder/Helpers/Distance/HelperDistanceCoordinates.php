<?php

namespace App\Services\GeoCoder\Helpers\Distance;

class HelperDistanceCoordinates implements HelperDistanceInterface
{
    protected float $startLat;
    protected float $startLon;
    public function __construct(float $startLat, float $startLon)
    {
        $this->startLat = $startLat;
        $this->startLon = $startLon;
    }

    public function calculate(float $finishLat, float $finishLon): float
    {
        return 2 * asin(sqrt(pow(sin(($this->startLat - $finishLat) / 2), 2) + cos($this->startLat) * cos($finishLat) * pow(sin(($this->startLon - $finishLon) / 2), 2)));
    }

}
