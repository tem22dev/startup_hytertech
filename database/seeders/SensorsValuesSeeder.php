<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SensorsValuesSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Lặp qua từng cảm biến từ 1 đến 12
        foreach (range(1, 12) as $sensorId) {
            // Tạo 50 bản ghi cho mỗi cảm biến
            foreach (range(1, 20) as $index) {
                DB::table('sensor_values')->insert([
                    'value' => $faker->randomFloat(2, 0, 100), // Giá trị ngẫu nhiên từ 0 đến 100
                    'station_id' => $this->getStationId($sensorId),
                    'measure_id' => $this->getMeasureId($sensorId), // Lấy measure_id tương ứng
                    'sensor_id' => $sensorId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }

    private function getMeasureId($sensorId)
    {
        if ($sensorId >= 1 && $sensorId <= 4) {
            return 1; // measure_id 1 cho cảm biến 1-4
        } elseif ($sensorId >= 5 && $sensorId <= 8) {
            return 2; // measure_id 2 cho cảm biến 5-8
        } else {
            return 3; // measure_id 3 cho cảm biến 9-12
        }
    }

    private function getStationId($sensorId)
    {
        if ($sensorId == 1 || $sensorId == 5 || $sensorId == 9) {
            return 1;
        }
        elseif ($sensorId == 2 || $sensorId == 6 || $sensorId == 10) {
            return 2;
        }
        elseif ($sensorId == 3 || $sensorId == 7 || $sensorId == 11) {
            return 2;
        }
        elseif ($sensorId == 4 || $sensorId == 8 || $sensorId == 12) {
            return 4;
        }
    }
}