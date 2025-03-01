<?php

namespace App\Services\Admin;

use App\Enums\CategoryStationEnum;
use App\Models\Station;

class StationService
{
    public function getList()
    {
        return Station::select(Station::getSelectedAttributes())
            ->orderBy('id', 'desc')
            ->get();
    }

    public function getNumberOfStation($request)
    {
        $numberOfStation = Station::where('category_station_id', $request)->count();

        return $numberOfStation;
    }

    public function getTotalAmount($request)
    {
        if ($request == CategoryStationEnum::TAT_CA) {
            $totalAmount = number_format(Station::sum('price'), 0, ',', '.') . ' VNĐ';
            return $totalAmount;
        } else {
            $totalAmount = number_format(Station::where('category_station_id', $request)->sum('price'), 0, ',', '.') . ' VNĐ';
            return $totalAmount;
        }
    }
}