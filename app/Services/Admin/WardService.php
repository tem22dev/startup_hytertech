<?php

namespace App\Services\Admin;

use App\Models\Ward;

class WardService
{
    public function getWardByDistrict($district_id)
    {
        return Ward::where('district_id', $district_id)
            ->with('districts')
            ->get();
    }
}