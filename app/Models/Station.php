<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;

    protected $table = "stations";

    protected $fillable = [
        'name',
        'image',
        'status',
        'price',
        'customer_id',
    ];

    public static function getSelectedAttributes(): array
    {
        return [
            'id',
            'name',
            'image',
            'status',
            'customer_id',
            'price',
            'created_at',
        ];
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function productCategory()
    {
        return $this->belongsTo(CategoryStation::class, 'category_station_id');
    }

    public function getDateCreatedAtAttribute()
    {
        return $this->created_at->format('H:i:s | d-m-Y');
    }

    public function getFormattedPriceAttribute()
    {
        return number_format($this->price, 0, ',', '.') . ' VND';
    }
}
