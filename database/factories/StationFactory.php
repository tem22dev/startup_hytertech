<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Station>
 */
class StationFactory extends Factory
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
            "name" => "Giàn số" . self::$counter++,
            "image" => "https://tamsach.com/kcfinder/upload_new/images/cach-lam-gian-trong-rau-thuy-canh-4.jpg",
            "status" => 1,
            "setup_date" => Carbon::now(),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
            "customer_id" => 61,
            "category_station_id" => $this->faker->randomElement([1, 2, 3]),
        ];
    }
}
