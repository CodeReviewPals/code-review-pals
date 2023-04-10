<?php

namespace App\Observers;

use App\Models\PullRequest;
use App\Actions\PullRequest\GenerateRepositoryName;

class PullRequestObserver
{
    /**
     * Handle the PullRequest "created" event.
     */
    public function created(PullRequest $pullRequest): void
    {
        app(GenerateRepositoryName::class)->execute($pullRequest);
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
