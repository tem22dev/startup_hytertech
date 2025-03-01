<?php

namespace App\Services\Mobile;

use App\Models\City;

class CityService
{
    public function getAllCity()
    {
        return City::select(City::getSelectAttributes())
            ->get();
    }
}