<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'full_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('root_admin_9999'),
            'tel' => $this->faker->unique()->phoneNumber(),
            'gender' => 1,
            'address' => null,
            'ward_id' => 1,
            'district_id' => 1,
            'city_id' => 1,
            'status' => 1,
            'avatar' => "https://t3.ftcdn.net/jpg/05/47/85/88/360_F_547858830_cnWFvIG7SYsC2GLRDoojuZToysoUna4Y.jpg",
            'remember_token' => Str::random(10)
        ];
    }
}
