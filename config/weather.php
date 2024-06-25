<?php

return [
    'api_key' => env('WEATHER_API_KEY', '4fe9bac093df272c61b6fa7cfaf67d35'),
    'data_source' => env('WEATHER_DATA_SOURCE', 'DB'),
    'cities' => [
        'Лондон',
        'Париж',
        'Мадрид',
        'Омск'
    ],
    'default_city' => env('DEFAULT_CITY', 'Лондон'),
    'default_unit' => env('DEFAULT_UNIT', 'metric')
];
