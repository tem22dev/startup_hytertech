<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class Customer extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    protected $table = 'customers';

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

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
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

    public function stations()
    {
        return $this->hasMany(Station::class, 'station_id', 'id');
    }
}
