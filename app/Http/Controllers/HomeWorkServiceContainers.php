<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MapService;
use App\Services\CoordinatesService;
use App\Services\RequestService;
use GuzzleHttp\Client as GuzzleClient;

class HomeWorkServiceContainers extends Controller
{
    private $mapService;
    private $requestService;
    private $coordinatesService;

    public function index(MapService $mapService, RequestService $requestService, CoordinatesService $coordinatesService)
    {
        
        $this->mapService = $mapService;
        $this->coordinatesService = $coordinatesService;
        $this->requestService = $requestService;

        $this->mapService
                ->setUrl('https://nominatim.openstreetmap.org/search.php?format=jsonv2&q=')
                ->setRequestClient($this->requestService->set_client(new GuzzleClient))
                ->setCoordinatesCalculator($this->coordinatesService->set_coordinates(46.4774700, 30.7326200))
                ->setProperties(['place_id', 'name', 'display_name', 'distance'])
                ->setSearch('Продукти Одеса');    
                
                dump($this->mapService->search());
                dump($this->mapService->search());

    
    }
}
