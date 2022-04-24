<?php

namespace Database\Factories;

use App\Models\Plastic;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
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
            'size' => $this->faker->numberBetween(0, 15),
        ];
    }
}
