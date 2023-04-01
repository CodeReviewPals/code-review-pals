<?php

namespace Database\Factories;

use App\Models\PullRequest;
use App\Enums\PullRequest\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PullRequest>
 */
class PullRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'       => fake()->sentence,
            'url'         => fake()->url,
            'status'      => fake()->randomElement(Status::cases()),
            'description' => fake()->sentence,
        ];
    }
}
