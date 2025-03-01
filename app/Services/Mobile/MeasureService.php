<?php 

namespace App\Services\Mobile;

use App\Models\MeasurementQuantity;
use App\Models\Measure;
use App\Models\Sensor;

class MeasureService 
{
    public function getMeasuresOfSensor($sensor_id) 
    {
        $measure = MeasurementQuantity::with('measure')
        ->where('sensor_id', $sensor_id)
        ->get();

        // return $measure;

        return $measure->map(function($item) {
            return [
                "id" => $item->measure_id,
                "name" => $item->measure->name,
                "icon" => $item->measure->icon,
                "description" => $item->measure->description,
            ];
        });
    }
}
