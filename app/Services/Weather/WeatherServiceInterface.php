<?php

namespace App\Services\Weather;

use App\Services\Weather\Cities\CityServiceInterface;
use Illuminate\Http\Request;

interface WeatherServiceInterface
{
    /**
     * @param Request $request
     * @param CityServiceInterface $cityService
     * @return array
     */
    public function getWeatherData(Request $request, CityServiceInterface $cityService): array;
}
