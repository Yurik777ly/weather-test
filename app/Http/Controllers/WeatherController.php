<?php

namespace App\Http\Controllers;

use App\Services\Weather\BuildWeatherDataInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    /**
     * @param Request $request
     * @param BuildWeatherDataInterface $weatherData
     * @return JsonResponse
     */
    public function index(Request $request, BuildWeatherDataInterface $weatherData): JsonResponse
    {
        return response()->json($weatherData->getWeatherData($request));
    }
}
