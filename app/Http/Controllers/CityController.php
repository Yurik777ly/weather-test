<?php

namespace App\Http\Controllers;

use App\Services\Weather\Cities\CityServiceInterface;
use Illuminate\Http\JsonResponse;

class CityController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(CityServiceInterface $service): JsonResponse
    {
        if (config('weather.data_source') === 'DB') {
            return response()->json($service->getCities());
        }

        return response()->json(config('weather.cities'));
    }
}
