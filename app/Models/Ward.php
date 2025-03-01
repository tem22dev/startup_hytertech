<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;

    protected $table = 'wards';

    public static function getSelectAttributes()
    {
        return [
            'id',
            'name_ward',
            'district_id',
        ];
    }

    public function districts()
    {
        return $this->belongsTo(Ward::class, 'district_id');
    }
}
