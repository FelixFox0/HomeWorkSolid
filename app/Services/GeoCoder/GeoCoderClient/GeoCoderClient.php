<?php

namespace App\Services\GeoCoder\GeoCoderClient;

use App\Services\GeoCoder\GeoCoder\GeoCoderInterface as GeoCoder;
use App\Services\GeoCoder\Helpers\Distance\HelperDistanceInterface as HelperDistance;
use GuzzleHttp\Client;
use StdClass;
use App\Services\GeoCoder\GeoCoder\Exceptions\GeoCoderException;
use Exception;
use App\Services\GeoCoder\GeoCoderClient\Exceptions\GeoCoderClientException;

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
        $this->places = $this->forceGetPlacesByGeoCoder();
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
        $this->places = $this->forceGetPlacesByGeoCoder();
        $this->idToKey();
        $this->places = $this->placesPrevious + $this->places;
        return $this;
    }

    /**
     * @return array
     * @throws GeoCoderClientException
     */
    protected function getPlacesByGeoCoder()
    {
        try {
            return $this->geoCoder->getPlaces($this->search);
        } catch (GeoCoderException $e) {
            throw new GeoCoderClientException($e->getMessage());
        }
    }

    protected function forceGetPlacesByGeoCoder()
    {
        for ($i = 1; $i <= 5; $i++) {
            try {
                return $this->getPlacesByGeoCoder();
            } catch (GeoCoderClientException $e) {
//                dump($i);
                sleep(1);
            }

        }
        throw $e;
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

        foreach ($this->places as $key=>$place){
            $this->places[$place->place_id] = $place;
            unset($this->places[$key]);
        }
    }

    public function multiSearchWithDistanceSortFilterProperties(
        string $search,
        int $countSearch = 1,
        HelperDistance $helperDistance = null,
        string $field = '',
        array $properties = [],
        bool $asc = true
    )
    {
        $this->multiSearch($search, $countSearch);

        if (!is_null($helperDistance)){
            $this->addDistance($helperDistance);
        }
        if ($field) {
            $this->sortByField($field, $asc);
        }
        if ($properties) {

            return $this->getPlacesFilterProperties($properties);
        }

        return $this->getPlaces();
    }

    protected function multiSearch(string $search, int $countSearch = 1)
    {
        $this->newSearch($search);

        for ($i = 1; $i < $countSearch; $i++) {
            $this->againSearch(true);
        }

        return $this;
    }

    public static function easyMultiSearchWithDistanceSortFilterProperties(
        string $search,
        int $countSearch = 1,
        HelperDistance $helperDistance = null,
        string $field = '',
        array $properties = [],
        bool $asc = true
    )
    {
        $class = new static(
            new \App\Services\GeoCoder\GeoCoder\GeoCoder(
                new Client(), 'https://nominatim.openstreetmap.org/search.php?format=jsonv2&q='
            )
        );
        return $class->multiSearchWithDistanceSortFilterProperties(
            $search,
            $countSearch,
            $helperDistance,
            $field ,
            $properties ,
            $asc
        );
    }

}
