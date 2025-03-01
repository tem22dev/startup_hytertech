<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\MeasurementQuantityService;
use Illuminate\Http\Request;

class MeasurementQuantityController extends Controller
{
    protected MeasurementQuantityService $measurementQuantity;

    public function __construct(MeasurementQuantityService $measurementQuantity)
    {
        $this->measurementQuantity = $measurementQuantity;
    }

    public function getData(Request $request)
    {
        $result = $this->measurementQuantity->getData($request);

        if ($result) {
            return $this->responseDataSuccess($result);
        }

        return $this->responseMessageBadrequest();
    }

    public function update(Request $request)
    {
        $result = $this->measurementQuantity->update($request);

        if ($result) {
            return $this->responseDataSuccess($result);
        }

        return $this->responseMessageBadrequest();
    }
}
