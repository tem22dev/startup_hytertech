<?php

namespace App\Http\Controllers\Mobile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Mobile\MeasureService;

class MeasureController extends Controller
{
    public MeasureService $measureService;

    public function __construct(
        MeasureService $measureService
    ) {
        $this->measureService = $measureService;
    }

    public function getMeasuresOfSensor(Request $request) 
    {
        $sensor_id = $request->query('sensor_id');
        $result = $this->measureService->getMeasuresOfSensor($sensor_id);

        if ($result) {
            return $this->responseDataSuccess($result);
        }

        return $this->responseMessageBadrequest();
    }
}
