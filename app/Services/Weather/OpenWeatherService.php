<?php

namespace App\Services\Weather;

use App\Services\Weather\Cities\CityServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OpenWeatherService implements BuildWeatherDataInterface
{
    public const ERROR_MESSAGE = 'К сожалению, информер не работает по техническим причинам';

    /**
     * @inheritDoc
     */
    public function getWeatherData(
        Request $request,
        CityServiceInterface $cityService
    ): array {
        $city = $request->input('city');
        if (null === $city) {
            $city = $cityService->getDefaultCity() ?? config('weather.default_city');
        }

        $unit = $request->input('unit') ?? config('weather.default_unit');

        try {
            $response = Http::retry(3, 100)
                ->get("https://api.openweathermap.org/data/2.5/weather", [
                    'q' => $city,
                    'units' => $unit,
                    'lang' => 'ru',
                    'appid' => config('weather.api_key')
                ]
            );
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return [
                'error' => self::ERROR_MESSAGE,
            ];
        }

        return $this->buildData($response->json());
    }

    /**
     * @param array $data
     * @return array
     */
    public function buildData(array $data): array
    {
        return [
            'temp' => $this->getTemperatureData($data),
            'speed' => $this->getSpeedData($data),
            'humidity' => $this->getHumidityData($data),
            'pressure' => $this->getPressureData($data),
            'description' => $this->getDescriptionData($data),
            'image' => $this->getDImageData($data),
            'city' => $this->city($data),
        ];
    }

    /**
     * @param array $data
     * @return int
     */
    public function getTemperatureData(array $data): int
    {
        return intval(round($data['main']['temp']));
    }

    /**
     * @param array $data
     * @return float
     */
    public function getSpeedData(array $data): float
    {
        return $data['wind']['speed'];
    }

    /**
     * @param array $data
     * @return int
     */
    public function getHumidityData(array $data): int
    {
        return $data['main']['humidity'];
    }

    /**
     * @param array $data
     * @return int
     */
    public function getPressureData(array $data): int
    {
        return $data['main']['pressure'];
    }

    /**
     * @param array $data
     * @return string
     */
    public function getDescriptionData(array $data): string
    {
        return ucfirst($data['weather'][0]['description']);
    }

    /**
     * @param array $data
     * @return string
     */
    public function getDImageData(array $data): string
    {
        return 'https://openweathermap.org/img/wn/' . $data['weather'][0]['icon'] . '@2x.png';
    }

    /**
     * @param array $data
     * @return string
     */
    public function city(array $data): string
    {
        return $data['name'];
    }
}
