<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Services\Mobile\StationService;
use Illuminate\Http\Request;

class StationController extends Controller
{
    public StationService $stationService;

    public function __construct(
        StationService $stationService
    ){
        $this->stationService = $stationService;
    }

    public function getStationInfo($id) {
        $result = $this->stationService->getStationInfo($id);

        if ($result) {
            return $this->responseDataSuccess($result);
        }

        return $this->responseMessageBadrequest();
    }

    public function getStationsOfUser($user_id) {
        $result = $this->stationService->getStationsOfUser($user_id);

        if ($result) {
            return $this->responseDataSuccess($result);
        }

        return $this->responseMessageBadrequest();
    }
}
