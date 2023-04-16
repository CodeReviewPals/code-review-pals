<?php

namespace App\Jobs\Discord\Channels;

use App\Models\Repository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Actions\Discord\Channels\CreateThreadFromRepository;

class CreateThreadFromRepositoryJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        protected Repository $repository
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        app(CreateThreadFromRepository::class)->execute($this->repository);
    }
}
