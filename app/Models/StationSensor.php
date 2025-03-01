<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StationSensor extends Model
{
    use HasFactory;

    protected $table = "station_sensors";

    protected $fillable = [
        'station_id',
        'sensor_id',
        'status',
    ];

    public function sensor()
    {
        return $this->belongsTo(Sensor::class, 'sensor_id');
    }

    public function station()
    {
        return $this->belongsTo(Station::class, 'station_id');
    }
}
