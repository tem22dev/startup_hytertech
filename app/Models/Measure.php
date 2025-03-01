<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Measure extends Model
{
    use HasFactory;

    protected $table = 'measures';

    protected $fillable = [
        'name',
        'icon',
        'description',
    ];

    public static function getSelectedAttributes(): array
    {
        return [
            'id',
            'name',
            'icon',
            'description',
            'created_at',
        ];
    }

    public static function getListNameSelectedAttributes(): array
    {
        return [
            'id',
            'name',
        ];
    }
}
