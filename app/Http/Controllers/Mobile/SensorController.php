<?php

namespace App\Http\Controllers\Mobile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Mobile\SensorService;

class SensorController extends Controller
{
    public SensorService $sensorService;

    public function __construct(
        SensorService $sensorService
    ) {
        $this->sensorService = $sensorService;
    }

    public function getSensorsOfStation(Request $request)
    {
        $station_id = $request->query('station_id');
        $result = $this->sensorService->getSensorsOfStation($station_id);

        if ($result) {
            return $this->responseDataSuccess($result);
        }

        return $this->responseMessageBadrequest();
    }

    public function getSensorInfo($id) 
    {
        $result = $this->sensorService->getSensorInfo($id);

        if ($result) {
            return $this->responseDataSuccess($result);
        }

        return $this->responseMessageBadrequest();
    }

    public function updateStatus(Request $request, $id) 
    {
        $status = $request->status;
        $result = $this->sensorService->updateStatus($id, $status);

        if ($result) {
            return $this->responseDataSuccess($result);
        };

        return $this->responseMessageBadrequest();
    }

    public function getSensorValues(Request $request)
    {
        $sensor_id = $request->sensor_id;
        $measure_id = $request->measure_id;

        $result = $this->sensorService->getSensorValues($sensor_id, $measure_id);

        return response()->json($result);
    }
}
