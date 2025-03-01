<?php 

namespace App\Services\Mobile;

use App\Models\Sensor;
use App\Models\SensorValue;
use App\Models\StationSensor;
use Carbon\Carbon;
use Ramsey\Uuid\Type\Integer;

class SensorService
{
    public function getSensorsOfStation($id)
    {
        return StationSensor::where('station_id', $id)
        ->with("sensor")
        ->get([
            "id",
            "sensor_id"
        ])
        ->map(function ($data) {
            return [
                "id" => $data->sensor->id,
                "name" => $data->sensor->name,
                "type" => $data->sensor->type,
                "image" => $data->sensor->image,
                "created_at" => $data->sensor->created_at,
            ];
        });
    }

    public function getSensorInfo($id) 
    {
        $sensor = Sensor::where('id', $id)
        ->with("stationSensor")
        ->first();

        return [
            "id" => $sensor->id,
            "name" => $sensor->name,
            "image" => $sensor->image,
            "type" => $sensor->type,
            "status" => $sensor->stationSensor->status,
            "description" => $sensor->description,
            "created_at" => $sensor->created_at,
        ];
    }

    public function updateStatus($sensor_id, $status)
    {
        $sensor = StationSensor::where('sensor_id', $sensor_id)->first();

        if (!$sensor) {
            return response()->json(['error' => 'Sensor not found']);
        }

        $sensor->status = $status;

        return $sensor->save();
    }

    public function getSensorValues($sensor_id, $measure_id)
    {
        $values = SensorValue::where([
            ['sensor_id', $sensor_id],
            ['measure_id', $measure_id],
        ])
        ->whereDate('created_at', Carbon::today())
        ->select('value', 'created_at')
        // ->limit(10)
        ->get();

        return $values;
    }
}