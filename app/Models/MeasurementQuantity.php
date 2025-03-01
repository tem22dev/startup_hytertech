<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeasurementQuantity extends Model
{
    use HasFactory;

    protected $table = 'measurement_quantities';

    protected $fillable = [
        'sensor_id',
        'measure_id',
    ];

    public static function getSelectedAttributes(): array
    {
        return [
            'id',
            'sensor_id',
            'measure_id',
        ];
    }

    public function measure()
    {
        return $this->belongsTo(Measure::class, 'measure_id', 'id');
    }
}
