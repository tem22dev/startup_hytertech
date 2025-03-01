<?php

namespace Database\Seeders;

use App\Models\Measure;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MeasuresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Measure::create([
            'name' => 'Temperature',
            'icon' => '°C',
            'description' => 'Nhiệt độ',
        ]);
        Measure::create([
            'name' => 'pH',
            'icon' => 'pH',
            'description' => 'Độ pH',
        ]);
        Measure::create([
            'name' => 'eC',
            'icon' => 'ms/cm',
            'description' => 'Độ EC',
        ]);
    }
}
