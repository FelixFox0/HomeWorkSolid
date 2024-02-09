<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Map\Map;
use App\Map\MapFinder;

use GuzzleHttp\Client as GuzzleClient;
use App\Coordinates\CoordinatesCalculator;


class HomeWorkSolidControllerTWO extends Controller
{
    public function index(Request $request)
    {


        
     	$find = new MapFinder;
        
		$find->setUrl('https://nominatim.openstreetmap.org/search.php?format=jsonv2&q=')->setRequestClient(new GuzzleClient)->setCoordinatesCalculator(new CoordinatesCalculator(46.4774700,30.7326200))->setSearch('Продукти Одеса')->setProperties(['place_id', 'name', 'display_name', 'distance']);


        $places=$find->search();
        dump($places);
     
     	$places=$find->search();
        dump($places);
     
     	$places=$find->search();
        dump($places);
    }
}
