<?php

namespace App\Http\Controllers;

use App\Services\GeoCoder\GeoCoderClient\GeoCoderClient;
use App\Services\GeoCoder\GeoCoderClient\GeoCoderClientInterface;
//use App\Services\GeoCoder\Helpers\Distance\HelperDistanceCoordinates;
use App\Services\GeoCoder\Helpers\Distance\HelperDistanceCoordinates;
use App\Services\GeoCoder\Helpers\Distance\HelperDistanceInterface;
use App\Services\GeoCoder\Helpers\Distance\HelperDistanceRoad;
use Illuminate\Http\Request;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Validator;
use App\Services\GeoCoder\GeoCoderClient\Exceptions\GeoCoderClientException;
use Illuminate\Http\JsonResponse;
use App\Repositories\MongoStartupLogBuilderRepository;
use App\Repositories\MongoStartupLogOrmRepository;
class HomeWorkSolidController extends Controller
{
    /**
     * @param Request $request
     * @param GeoCoderClientInterface $geoCoderClient
     * @param HelperDistanceInterface $helperDistance
     * @param ResponseFactory $response
     * @param Validator $validator
     * @return JsonResponse
     */
    public function index(
        Request $request,
        GeoCoderClientInterface $geoCoderClient,
        HelperDistanceInterface $helperDistance,
        ResponseFactory $response
    ): JsonResponse
    {
//        $mongoRepository = new MongoStartupLogBuilderRepository();
//        $mongoRepository->getData();

//        (new \App\Repositories\LogErrorRepository\LogErrorOrmRepository())->writeError('111','222');
//        $mongoRepository = new MongoStartupLogOrmRepository();
//        $mongoRepository->getData();

        $search = $request->input('search');
        $quantity = $request->input('quantity') ?? 1;
        $calculator = $request->input('calculator') ?? '';
//        var_dump($request);
//        die();


        // necessary properties
        $properties = config('geoCoder.properties');

        try {
            $places = $geoCoderClient->multiSearchWithDistanceSortFilterProperties(
                $search,
                $quantity,
                $helperDistance,
                'distance',
                $properties
            );
        } catch (GeoCoderClientException $e) {
            abort(404);
        }

        return $response->json($places);

    }
}
