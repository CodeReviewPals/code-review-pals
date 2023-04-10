<?php

namespace App\Jobs\Github\Repository;

use App\Models\Repository;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Database\Eloquent\Collection;

class FetchAllPullRequest implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @param Collection<int, Repository>|null $repositories
     */
    public function __construct(public ?Collection $repositories = null)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if (!is_null($this->repositories)) {
            $this->repositories->each(fn($repository) => FetchAllPullRequestFromRepository::dispatch($repository));
        } else {
            Repository::query()
                ->forJob()
                ->chunk(10, function ($repositories) {
                    foreach ($repositories as $repository) {
                        FetchAllPullRequestFromRepository::dispatch($repository);
                    }
                });
        }
    }
}
