<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorValue extends Model
{
    use HasFactory;

    protected $table = "sensor_values";

    protected $fillable = [
        'value',
        'station_id',
        'sensor_id',
        'measure_id',
    ];

    public static function getSelectedAttributes(): array
    {
        return [
            'id',
            'station_id',
            'sensor_id',
            'measure_id',
            'created_at',
        ];
    }

    public function sensor()
    {
        return $this->belongsTo(Sensor::class);
    }
}
