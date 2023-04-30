<?php

namespace Database\Factories;

use App\Enums\PullRequest\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PullRequest>
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
        $repository = sprintf('%s/%s', fake()->userName(), fake()->realText(20));
        return [
            'node_id' => fake()->randomNumber(3),
            'repository' => $repository,
            'title' => fake()->realText(20),
            'html_url' => sprintf('https://github.com/%s', $repository),
            'status' => Status::OPEN,
            'description' => fake()->realText(),
        ];
    }
}
