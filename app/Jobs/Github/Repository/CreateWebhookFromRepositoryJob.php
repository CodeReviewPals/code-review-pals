<?php

namespace App\Jobs\Github\Repository;

use App\Models\Repository;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Actions\Github\Repository\CreateWebhookFromRepository;

class CreateWebhookFromRepositoryJob implements ShouldQueue
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
        app(CreateWebhookFromRepository::class)->execute($this->repository);
    }
}
