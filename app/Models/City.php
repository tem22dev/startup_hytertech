<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'cities';
    
    public static function getSelectAttributes()
    {
        return [
            'id',
            'name_city'
        ];
    }

    public function districts()
    {
        return $this->hasMany(District::class, 'city_id', 'id');
    }

}
