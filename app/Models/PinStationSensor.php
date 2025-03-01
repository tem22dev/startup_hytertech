<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinStationSensor extends Model
{
    use HasFactory;
    protected $fillable = [
        'pin_id',
        'station_sensor_id',
    ];
}
