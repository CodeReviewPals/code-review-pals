<?php

namespace App\Observers;

use App\Models\PullRequest;
use App\Actions\PullRequest\GenerateRepositoryName;
use App\Actions\Repository\CreateRepositoryByPullRequest;

class PullRequestObserver
{
    /**
     * Handle the PullRequest "created" event.
     */
    public function created(PullRequest $pullRequest): void
    {
        $pullRequest->repository = app(GenerateRepositoryName::class)->execute($pullRequest);
        $repository = app(CreateRepositoryByPullRequest::class)->execute($pullRequest);
        $pullRequest->repository_id = $repository->id;
        $pullRequest->saveQuietly();
    }

    /**
     * Handle the PullRequest "updated" event.
     */
    public function updated(PullRequest $pullRequest): void
    {
        if ($pullRequest->isDirty('html_url')) {
            app(GenerateRepositoryName::class)->execute($pullRequest);
        }
    }
}
