<?php

return [
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
