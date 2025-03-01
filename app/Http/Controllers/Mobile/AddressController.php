<?php

namespace App\Http\Controllers\Mobile;

use Illuminate\Http\Request;
use App\Models\City;
use App\Http\Controllers\Controller;
use App\Services\Mobile\CityService;
use App\Services\Mobile\DistrictService;
use App\Services\Mobile\WardService;

class AddressController extends Controller
{
    public CityService $cityService;
    public DistrictService $districtService;
    public WardService $wardService;

    public function __construct(
        CityService $cityService,
        DistrictService $districtService,
        WardService $wardService,
    ){
        $this->cityService = $cityService;
        $this->districtService = $districtService;
        $this->wardService = $wardService;
    }

    public function getCities() {
        $result = $this->cityService->getAllCity();

        if ($result) {
            return $this->responseDataSuccess($result);
        }

        return $this->responseMessageBadrequest();
    }

    public function getDistrictsByCityId($city_id) {
        $result = $this->districtService->getDistrictsByCity($city_id);

        if ($result) {
            return $this->responseDataSuccess($result);
        }

        return $this->responseMessageBadrequest();
    }

    public function getWardsByDistrictId($district_id) {
        $result = $this->wardService->getWardsByDistrictId($district_id);

        if ($result) {
            return $this->responseDataSuccess($result);
        }

        return $this->responseMessageBadrequest();
    }
}
