<?php

namespace App\Http\Controllers;

//use App\Services\GeoCoder\GeoCoderClient\GeoCoderClient;
use App\Services\GeoCoder\GeoCoderClient\GeoCoderClientInterface;
//use App\Services\GeoCoder\Helpers\Distance\HelperDistanceCoordinates;
use App\Services\GeoCoder\Helpers\Distance\HelperDistanceInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\Facades\Response;

//use GuzzleHttp\Client as GuzzleClient;
//use GuzzleHttp\ClientInterface;
//use App\Services\GeoCoder\GeoCoder\GeoCoder;
//use App\Services\GeoCoder\GeoCoder\GeoCoderInterface;

class HomeWorkSolidController extends Controller
{
    public function index(
        Request $request,
        GeoCoderClientInterface
        $geoCoderClient,
        HelperDistanceInterface $helperDistance,
        ResponseFactory $response
    )
    {
//        $url = 'https://nominatim.openstreetmap.org/search.php?format=jsonv2&q=';
        $search = 'Продукти Одеса';

        // init coordinates
//        $lat = 46.4774700;
//        $lon = 30.7326200;

        // necessary properties
        $properties = ['place_id', 'name', 'display_name', 'distance'];

        // start parse api
//        $guzzleClient = new GuzzleClient();
//        $geoCoder = new GeoCoder($guzzleClient, $url);
//        $helperDistance = new HelperDistanceCoordinates($lat, $lon);
//        $geoCoderClient = new GeoCoderClient($geoCoder);
//        dd($helperDistance);

        $geoCoderClient
            ->newSearch($search)
            ->addDistance($helperDistance)
            ->sortByField('distance');
        $places = $geoCoderClient->getPlacesFilterProperties($properties);
//        dump($places);

        $geoCoderClient
            ->againSearch()
            ->addDistance($helperDistance)
            ->sortByField('distance');
        $places = $geoCoderClient->getPlacesFilterProperties($properties);
//        dump($places);

        return $response->json(['azaza' => 'olol54o']);
//        return Response::json(['azaza' => 'ololo']);

//        die();

    }
}
