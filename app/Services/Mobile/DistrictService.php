<?php

namespace App\Services\Mobile;

use App\Models\District;

class DistrictService
{
    public function getDistrictsByCity($city_id)
    {
        return District::where('city_id', $city_id)
            // ->with('wards')
            ->get();
    }
}