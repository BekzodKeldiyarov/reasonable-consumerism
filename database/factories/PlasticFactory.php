<?php

namespace Database\Factories;

use App\Models\Good;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plastic>
 */
class PlasticFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $goods = Good::pluck('id')->toArray();
        return [
            'id' => $this->faker->unique()->randomElement($goods),
            'biodigration_time' => $this->faker->numberBetween(0, 15),
            'toxic_spread_emission' => $this->faker->numberBetween(0, 1000),
            'polyethylene_density' => $this->faker->numberBetween(10, 100)
        ];
    }
}
