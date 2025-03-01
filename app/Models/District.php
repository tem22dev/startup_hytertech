<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $table = 'districts';

    public static function getSelectAttributes()
    {
        return [
            'id',
            'name_district',
            'city_id'
        ];
    }

    public function wards()
    {
        return $this->hasMany(Ward::class, 'district_id', 'id');
    }

    public function cities()
    {
        return $this->belongsTo(City::class, 'district_id');
    }
}
