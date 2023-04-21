<?php

namespace App\Policies;

use App\Models\PullRequest;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PullRequestPolicy
{

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PullRequest $pullRequest): bool
    {
        return $pullRequest->user_id === $user->id;
    }
}
