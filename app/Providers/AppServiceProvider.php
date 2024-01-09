<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Client as GuzzleClient;
use App\Services\GeoCoder\GeoCoder\GeoCoder;
use App\Services\GeoCoder\GeoCoder\GeoCoderInterface;
use App\Services\GeoCoder\GeoCoderClient\GeoCoderClient;
use App\Services\GeoCoder\GeoCoderClient\GeoCoderClientInterface;
use App\Services\GeoCoder\Helpers\Distance\HelperDistanceCoordinates;
use App\Services\GeoCoder\Helpers\Distance\HelperDistanceInterface;
use Illuminate\Contracts\Foundation\Application;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(GeoCoderInterface::class, GeoCoder::class);
        $this->app->bind(GeoCoderClientInterface::class, function (Application $app) {
            return new GeoCoderClient($app->make(GeoCoderInterface::class, ['url' => 'https://nominatim.openstreetmap.org/search.php?format=jsonv2&q=']));
        });

        $this->app->bind(HelperDistanceInterface::class, HelperDistanceCoordinates::class);
//        $this->app->bind(HelperDistanceInterface::class, function (Application $app) {
//            return new HelperDistanceCoordinates(0,  0);
//        });
        $helperDistance = $this->app->when(HelperDistanceCoordinates::class);
        $helperDistance->needs('$startLat')
            ->give(46.4774700);
        $helperDistance->needs('$startLon')
            ->give(30.7326200);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(ClientInterface::class, GuzzleClient::class);
    }
}
