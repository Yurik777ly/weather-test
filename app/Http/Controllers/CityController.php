<?php

namespace App\Http\Controllers;

use App\Services\Weather\Cities\CityServiceInterface;
use Illuminate\Http\JsonResponse;

class CityController extends Controller
{
    /**
     * @param CityServiceInterface $service
     * @return JsonResponse
     */
    public function index(CityServiceInterface $service): JsonResponse
    {
        return response()->json($service->getCities());
    }
}
