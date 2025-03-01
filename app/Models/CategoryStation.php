<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryStation extends Model
{
    use HasFactory;

    protected $table = 'category_stations';

    protected $fillable = [
        'name',
        'image',
    ];

    public static function getSelectedAttributes(): array
    {
        return [
            'id',
            'name',
            'image',
            'created_at',
        ];
    }

    public function products()
    {
        return $this->hasMany(Station::class, 'category_station_id', 'id');
    }
}
