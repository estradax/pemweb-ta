<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $bed_count = fake()->numberBetween(1, 2);

        return [
            'public_id' => fake()->numerify('R###'),
            'bed_count' => $bed_count,
            'price' => $bed_count == 1 ? fake()->randomFloat(2, 300, 500) : fake()->randomFloat(2, 501, 900)
        ];
    }
}
