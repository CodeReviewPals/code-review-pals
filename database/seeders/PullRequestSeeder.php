<?php

namespace Database\Seeders;

use App\Models\PullRequest;
use Illuminate\Database\Seeder;

class PullRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PullRequest::factory(50)->create();
    }
}
