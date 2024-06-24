<?php

namespace App\Http\Controllers;

use App\Services\Weather\BuildWeatherDataInterface;
use App\Services\Weather\Cities\CityServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    /**
     * @param Request $request
     * @param BuildWeatherDataInterface $weatherData
     * @return JsonResponse
     */
    public function index(
        Request $request,
        BuildWeatherDataInterface $weatherData,
        CityServiceInterface $cityService
    ): JsonResponse {
        return response()->json($weatherData->getWeatherData($request, $cityService));
    }
}
