<?php

namespace App\Services\Admin;

use App\Models\City;

class CityService
{
    public function getAllCity()
    {
        return City::select(City::getSelectAttributes())
            ->get();
    }
}