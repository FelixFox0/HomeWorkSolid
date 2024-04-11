<?php

namespace App\Services\GeoCoder\Helpers\Distance;

interface HelperDistanceFactoryInterface
{
    public function make(string $name): HelperDistanceInterface;
}
