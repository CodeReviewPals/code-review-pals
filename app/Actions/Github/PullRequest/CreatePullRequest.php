<?php

namespace App\Actions\Github\PullRequest;

use App\Models\User;
use App\Models\PullRequest;
use App\Enums\Github\Repository\PullRequest\State;
use App\DTO\Github\Repository\PullRequest\PullRequestData;

class CreatePullRequest
{
    /**
     * Check if pull request exist and update the existing one or create a new one.
     *
     * @param PullRequestData $pullRequestData
     * @param User            $user
     *
     * @return PullRequest|null
     */
    public function execute(PullRequestData $pullRequestData, User $user): ?PullRequest
    {
        if ($pullRequestData->state === State::CLOSED) {
            return null;
        }

        return $user
            ->pullRequests()
            ->updateOrCreate(['node_id' => $pullRequestData->nodeId], $pullRequestData->toArray());
    }
}
