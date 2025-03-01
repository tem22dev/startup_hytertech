<?php

namespace App\Services\Mobile;

use App\Models\Ward;

class WardService
{
    public function getWardsByDistrictId($district_id)
    {
        return Ward::where('district_id', $district_id)
            // ->with('districts')
            ->get();
    }
}