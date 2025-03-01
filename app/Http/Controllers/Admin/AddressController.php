<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\DistrictService;
use App\Services\Admin\WardService;
use Illuminate\Http\Request;

class AddressController extends Controller
{   
    public DistrictService $districtService;
    public WardService $wardService;

    public function __construct(
        DistrictService $districtService,
        WardService $wardService
    ){
        $this->districtService = $districtService;
        $this->wardService = $wardService;
    }

    public function getDistrictByCity($city_id)
    {
        $result = $this->districtService->getDistrictByCity($city_id);

        if ($result) {
            return $this->responseDataSuccess($result);
        }

        return $this->responseMessageBadrequest();
    }

    public function getWardByDistrict($district_id)
    {
        $result = $this->wardService->getWardByDistrict($district_id);

        if ($result) {
            return $this->responseDataSuccess($result);
        }

        return $this->responseMessageBadrequest();
    }
}
