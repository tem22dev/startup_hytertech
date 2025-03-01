<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name',
        'email',
        'password',
        'tel',
        'gender',
        'address',
        'user_type',
        'ward_id',
        'district_id',
        'city_id',
        'status',
        'avatar',
        'remember_token'			
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public static function getSelectedAttributes(): array
    {
        return [
            'id',
            'full_name',
            'tel',
            'gender',
            'address',
            'email',
            'user_type',
            'city_id',
            'avatar',
            'status',
            'created_at',
        ];
    }

    public function cities()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function districts()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function wards()
    {
        return $this->belongsTo(Ward::class, 'ward_id');
    }
}
