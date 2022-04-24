<?php

namespace Database\Factories;

use App\Models\Good;
use App\Models\Plastic;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plastic>
 */
class BottleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $plastics = Plastic::pluck('id')->toArray();
        return [
            'id' => $this->faker->unique()->randomElement($plastics),
            'volume' => $this->faker->numberBetween(0, 15),
        ];
    }
}
