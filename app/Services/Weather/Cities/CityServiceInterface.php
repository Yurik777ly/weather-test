<?php

namespace App\Services\Weather\Cities;

interface CityServiceInterface
{
    /**
     * @return array
     */
    public function getCities(): array;

    /**
     * @return string
     */
    public function getDefaultCity(): string;
}
