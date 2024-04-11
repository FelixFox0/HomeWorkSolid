<?php

namespace App\Services\GeoCoder\GeoCoderClient;

use App\Services\GeoCoder\Helpers\Distance\HelperDistanceInterface as HelperDistance;

interface GeoCoderClientInterface
{
    public function getPlaces();
    public function newSearch(string $search): GeoCoderClient;
    public function againSearch(bool $savePrevious = false): GeoCoderClient;
    public function addDistance(HelperDistance $helperDistance, $forceRecalculate = false);
    public function sortByField(string $field, bool $asc = true);
    public function getPlacesFilterProperties(array $properties);
    public function multiSearchWithDistanceSortFilterProperties(
        string $search,
        int $countSearch = 1,
        HelperDistance $helperDistance = null,
        string $field = '',
        array $properties = [],
        bool $asc = true
    );

    public static function easyMultiSearchWithDistanceSortFilterProperties(
        string $search,
        int $countSearch = 1,
        HelperDistance $helperDistance = null,
        string $field = '',
        array $properties = [],
        bool $asc = true
    );
}
