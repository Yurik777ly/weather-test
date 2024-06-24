<?php

namespace App\Services\Weather\Cities;

use App\Models\City;
use App\Services\Weather\Cities\CityServiceInterface;

class CityService implements CityServiceInterface
{

    /**
     * @inheritDoc
     */
    public function getCities(): array
    {
        $cities = City::query()->get('name')->toArray();

        foreach ($cities as $city) {
            $data[] = $city['name'];
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function getDefaultCity(): string
    {
        return City::query()->where('default', true)->first()->name;
    }
}
