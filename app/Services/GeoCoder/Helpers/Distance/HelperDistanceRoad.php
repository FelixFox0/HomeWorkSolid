<?php

namespace App\Services\GeoCoder\Helpers\Distance;

class HelperDistanceRoad implements HelperDistanceInterface
{
    public function calculate(float $finishLat, float $finishLon): float
    {
        return 0.3;
    }
}
