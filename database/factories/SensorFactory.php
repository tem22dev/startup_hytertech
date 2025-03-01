<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sensor>
 */
class SensorFactory extends Factory
{
    protected static $counter = 1;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "id" => self::$counter,
            "name" => "Cảm biến số " . self::$counter++,
            "image" => "https://bizweb.dktcdn.net/100/522/662/products/sen0161-v2-03cee752e6bb436390898549a870f2ba-1024x1024.jpg?v=1723077683320",
            "type" => "1",
            "description" => "Cảm biến",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ];
    }
}
