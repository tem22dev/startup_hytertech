<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sensor extends Model
{
    use HasFactory;

    protected $table = "sensors";

    protected $fillable = [
        'name',
        'image',
        'type',
        'description',
    ];

    public static function getSelectedAttributes(): array
    {
        return [
            'id',
            'name',
            'image',
            'type',
            'description',
            'created_at',
        ];
    }

    public function stationSensor()
    {
        return $this->hasOne(StationSensor::class, 'sensor_id');
    }

    public function values(): HasMany
    {
        return $this->hasMany(SensorValue::class);
    }

    public function measurementQuantities()
    {
        return $this->hasMany(MeasurementQuantity::class);
    }
}
