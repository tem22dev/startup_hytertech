<?php

namespace App\Http\Controllers\Customer;

use App\Enums\MeasureEnum;
use App\Enums\SensorEnum;
use App\Http\Controllers\Controller;
use App\Models\MeasurementQuantity;
use App\Models\PinStationSensor;
use App\Models\SensorValue;
use App\Models\Station;
use App\Models\StationSensor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Events\UpdateChart;
class ProcessSensorController extends Controller
{
    private Model $model;

    public function __construct()
    {
        $this->model = new Station();
    }

    public function store(Request $request)
    {
        Log::info('POST: ', $request->all());

        if ($request->has('pH') || $request->has('eC')) {
            $pH = $request->get('pH');
            $eC = $request->get('eC');
            $user_id = $request->get('customer_id');

            $stationID = $this->model::query()->where('customer_id', $user_id)->value('id');

            $station_sensors = StationSensor::query()->where('station_id', $stationID)->get('sensor_id');

            $pH_old = SensorValue::query()
                ->where('id', function ($query) {
                    $query
                        ->selectRaw('max(id)')
                        ->from('sensor_values')
                        ->where('measure_id', MeasureEnum::PH)
                        ->where('sensor_id', SensorEnum::PH);
                })
                ->value('value');

            $eC_old = SensorValue::query()
                ->where('id', function ($query) {
                    $query
                        ->selectRaw('max(id)')
                        ->from('sensor_values')
                        ->where('measure_id', MeasureEnum::MS_CM)
                        ->where('sensor_id', SensorEnum::EC);
                })
                ->value('value');

            foreach ($station_sensors as $item) {
                if ($item->sensor_id == SensorEnum::PH) {
                    $measurement_quantities = MeasurementQuantity::query()
                        ->where('sensor_id', $item->sensor_id)
                        ->get('measure_id');

                    foreach ($measurement_quantities as $each) {
                        if ($pH_old != $pH) {
                            SensorValue::query()->create([
                                'value' => $pH,
                                'sensor_id' => $item->sensor_id,
                                'measure_id' => $each->measure_id,
                                'station_id' => $stationID,
                            ]);
                        }
                    }
                }

                if ($item->sensor_id == SensorEnum::EC) {
                    $measurement_quantities = MeasurementQuantity::query()
                        ->where('sensor_id', $item->sensor_id)
                        ->get('measure_id');

                    foreach ($measurement_quantities as $each) {
                        if ($eC_old != $eC) {
                            SensorValue::query()->create([
                                'value' => $eC,
                                'sensor_id' => $item->sensor_id,
                                'measure_id' => $each->measure_id,
                                'station_id' => $stationID,
                            ]);
                        }
                    }
                }
            }
        }
        event(new UpdateChart(['text' => 'chart' ]));
        return response()->json('success', 200);
    }

    public function get_sensor(Request $request)
    {
        Log::info('POST: ', $request->all());

        $sensors = PinStationSensor::query()
            ->where(
                'station_id',
                Station::query()
                    ->where('customer_id', $request->customer_id)
                    ->value('id'),
            )
            ->join('pins', 'pins.id', '=', 'pin_station_sensors.pin_id')
            ->get(['sensor_id', 'pin']);

        return response()->json(
            [
                'sensors' => $sensors,
            ],
            200,
        );
    }

    public function get_sensor_status(Request $request)
    {
        Log::info('POST: ', $request->all());

        $sensor_statuses = StationSensor::query()
            ->where(
                'station_id',
                Station::query()
                    ->where('customer_id', $request->customer_id)
                    ->value('id'),
            )
            ->get(['sensor_id', 'status']);

        return response()->json(
            [
                'statuses' => $sensor_statuses,
            ],
            200,
        );
    }
}
