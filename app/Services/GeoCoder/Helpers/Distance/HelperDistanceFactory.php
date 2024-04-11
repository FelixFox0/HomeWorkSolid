<?php

namespace App\Services\GeoCoder\Helpers\Distance;


use Exception;
class HelperDistanceFactory implements HelperDistanceFactoryInterface
{
    public function __construct(HelperDistanceRoad $road, HelperDistanceCoordinates $coordinates)
    {

    }



    public function make(string $name): HelperDistanceInterface
    {
        switch ($name) {
            case 'road':
                $return = $this->road;
                break;
            case 'coordinates':
                $return = $this->coordinates;
                break;
            default:
                throw new Exception('No matches');
        }

        return $return;
    }
}
