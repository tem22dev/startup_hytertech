<?php

namespace App\Services\Admin;

use App\Models\MeasurementQuantity;
use App\Models\Sensor;

class MeasurementQuantityService
{
    public function getData($request)
    {
        return Sensor::select(['id'])
            ->with('measurementQuantities')
            ->where('id', $request->id)
            ->first();
    }

    public function update($request)
    {
        $sensor = Sensor::find($request->id);

        if ($sensor) {
            $measureIds = $request->input('measure_id', []);
            $existingMeasurementQuantities = $sensor->measurementQuantities->pluck('measure_id')->toArray();

            if ($existingMeasurementQuantities != $measureIds) {
                MeasurementQuantity::where('sensor_id', $sensor->id)->delete();

                foreach ($measureIds as $measureId) {
                    MeasurementQuantity::create([
                        'sensor_id' => $sensor->id,
                        'measure_id' => $measureId,
                    ]);
                }
            }
            return true;
        }
        return false;
    }
}