<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\CoordinatesService;

use App\Services\MapService;
use App\Services\RequestService;




class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
         $this->app->singleton(MapService::class, function () {
            return new MapService();
        });
        $this->app->singleton(CoordinatesService::class, function () {
            return new CoordinatesService();
        });
        $this->app->singleton(RequestService::class, function () {
            return new RequestService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
