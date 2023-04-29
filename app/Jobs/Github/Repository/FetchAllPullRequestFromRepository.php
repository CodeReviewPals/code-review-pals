<?php

namespace App\Jobs\Github\Repository;

use Exception;
use App\Models\Repository;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Spatie\LaravelData\DataCollection;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Actions\Github\Repository\GetAllPullRequest;
use App\Actions\Github\PullRequest\CreatePullRequest;
use App\DTO\Github\Repository\PullRequest\PullRequestData;

class FetchAllPullRequestFromRepository implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(protected Repository $repository)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            /** @var DataCollection<int, PullRequestData> $pullRequests */
            $pullRequests = app(GetAllPullRequest::class)
                ->execute(
                    username: $this->repository->username,
                    repository: $this->repository->repository
                )
                ->dtoOrFail();

            if (!$pullRequests instanceof DataCollection) {
                exit();
            }

            $pullRequests->each(function (PullRequestData $pullRequestData) {
                app(CreatePullRequest::class)->execute(
                    pullRequestData: $pullRequestData,
                    user: $this->repository->user // @phpstan-ignore-line
                );
            });
        } catch (Exception) {
            exit();
        }
    }
}
