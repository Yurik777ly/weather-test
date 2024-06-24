<?php

namespace App\Providers;

use App\Services\Weather\BuildWeatherDataInterface;
use App\Services\Weather\OpenWeatherService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(BuildWeatherDataInterface::class, OpenWeatherService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
