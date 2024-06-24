<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cities')->insert([
            'name' => 'Омск',
            'default' => true,
        ]);
        DB::table('cities')->insert([
            'name' => 'Минск',
            'default' => false,
        ]);
        DB::table('cities')->insert([
            'name' => 'Лондон',
            'default' => false,
        ]);
        DB::table('cities')->insert([
            'name' => 'Мадрид',
            'default' => false,
        ]);
        DB::table('cities')->insert([
            'name' => 'Таллин',
            'default' => false,
        ]);
    }
}
