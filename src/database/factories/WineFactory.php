<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wine>
 */
class WineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->unique()->sentence(1),
            "discription" => $this->faker->sentence(10),
            "price" => $this->faker->numberBetween(10,299),
            "date" => $this->faker->date(),
            "type_id" => $this->faker->numberBetween(1,3),
        ];
    }
}
