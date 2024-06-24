<?php

namespace App\Services\Weather;

use Illuminate\Http\Request;

interface WeatherServiceInterface
{
    /**
     * @param Request $request
     * @return array
     */
    public function getWeatherData(Request $request): array;
}
