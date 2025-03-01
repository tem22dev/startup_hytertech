<?php

namespace App\Services\Admin;

use App\Models\District;

class DistrictService
{
    public function getDistrictByCity($city_id)
    {
        return District::where('city_id', $city_id)
            ->with('wards')
            ->get();
    }
}