<?php

namespace App\Services\GeoCoder\GeoCoderClient;

use App\Services\GeoCoder\GeoCoder\GeoCoderInterface as GeoCoder;
use App\Services\GeoCoder\Helpers\Distance\HelperDistanceInterface as HelperDistance;
use StdClass;

class GeoCoderClient implements GeoCoderClientInterface
{

    protected GeoCoder $geoCoder;
    protected string $search;
    protected array $places;
    protected array $placesPrevious;
    protected float $startLat;
    protected float $startLon;

    public function __construct(GeoCoder $geoCoder)
    {
        $this->geoCoder = $geoCoder;
    }

    public function getPlaces()
    {
        return $this->places;
    }

    public function newSearch(string $search): GeoCoderClient
    {
        $this->search = $search;
        $this->placesPrevious = [];
        $this->geoCoder->setExcludePlaceIds();
        $this->places = $this->geoCoder->getPlaces($this->search);
        $this->idToKey();

        return $this;
    }

    public function againSearch(bool $savePrevious = false): GeoCoderClient
    {
        if ($savePrevious) {
            $this->placesPrevious = $this->places;
        } else {
            $this->placesPrevious = [];
        }

        $this->geoCoder->setExcludePlaceIds(
            array_merge(
                $this->geoCoder->getExcludePlaceIds(),
                array_keys($this->places)
            )
        );
        $this->places = $this->geoCoder->getPlaces($this->search);
        $this->idToKey();
        $this->places = $this->placesPrevious + $this->places;
        return $this;
    }

    public function addDistance(HelperDistance $helperDistance, $forceRecalculate = false)
    {
        foreach ($this->places as $place){
            if (empty($place->distance) || $forceRecalculate) {
                $place->distance = $helperDistance->calculate($place->lat, $place->lon);
            }
        }

        return $this;
    }

    public function sortByField(string $field, bool $asc = true)
    {
        uasort($this->places, function($a, $b) use ($field, $asc){
            $k = $asc ? 1 : -1;
            return ($a->$field < $b->$field) ? $k * -1 : $k * 1;
        });

        return $this;
    }

    public function getPlacesFilterProperties(array $properties)
    {
        foreach ($this->places as $key=>$place){
            $result[$key] = new StdClass();
            foreach ($place as $prop=>$val) {
                if (in_array($prop, $properties)){
                    $result[$key]->$prop = $val;
                }
            }
        }
        return $result ?? [];
    }

    protected function idToKey(): void
    {

//        array_combine(array_keys($this->places), array_values($this->places)
        foreach ($this->places as $key=>$place){
            $this->places[$place->place_id] = $place;
            unset($this->places[$key]);
        }
    }

}