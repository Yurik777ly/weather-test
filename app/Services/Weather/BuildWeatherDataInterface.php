<?php

namespace App\Services\Weather;


interface BuildWeatherDataInterface extends WeatherServiceInterface
{
    /**
     * @param array $data
     * @return array
     */
    public function buildData(array $data): array;

    /**
     * @param array $data
     * @return int
     */
    public function getTemperatureData(array $data): int;

    /**
     * @param array $data
     * @return float
     */
    public function getSpeedData(array $data): float;

    /**
     * @param array $data
     * @return int
     */
    public function getHumidityData(array $data): int;

    /**
     * @param array $data
     * @return int
     */
    public function getPressureData(array $data): int;

    /**
     * @param array $data
     * @return string
     */
    public function getDescriptionData(array $data): string;

    /**
     * @param array $data
     * @return string
     */
    public function getDImageData(array $data): string;

    /**
     * @param array $data
     * @return string
     */
    public function city(array $data): string;
}
