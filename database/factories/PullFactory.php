<?php

namespace Database\Factories;

use App\Enums\Pull\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pull>
 */
class PullFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'       => $this->faker->sentence,
            'url'         => $this->faker->url,
            'status'      => $this->faker->randomElement(Status::cases()),
            'description' => $this->faker->sentence,
        ];
    }
}
