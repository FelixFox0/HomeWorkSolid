<?php

namespace App\Services\GeoCoder\Helpers\Distance;

interface HelperDistanceInterface
{
    public function calculate(float $finishLat, float $finishLon): float;
}