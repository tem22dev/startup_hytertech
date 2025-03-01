<?php

namespace App\Services\Mobile;

use App\Models\Station;

class StationService
{
    public function getStationInfo($id) {
        $station = Station::where('id', $id)
        ->with('productCategory')
        ->first([
            'id',
            'name',
            'image',
            'created_at',
            'category_station_id',
        ]);

        return [
            'id' => $station->id,
            'name' => $station->name,
            'image' => $station->image,
            'created_at' => $station->created_at,
            'category' => $station->productCategory->name,
            'category_name' => $station->productCategory->name,
        ];
    }

    public function getStationsOfUser($id)
    {
        return Station::where('customer_id', $id)->get([
            'id',
            'name',
            'image',
            'created_at',
        ]);
    }
}