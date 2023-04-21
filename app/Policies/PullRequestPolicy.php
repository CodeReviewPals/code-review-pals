<?php

namespace App\Policies;

use App\Models\User;
use App\Models\PullRequest;

class PullRequestPolicy
{
    public function viewAny(): bool
    {
        return true;
    }

    public function view(): bool
    {
        return true;
    }

    public function create(): bool
    {
        return true;
    }

    public function update(User $user, PullRequest $repository): bool
    {
        return isSelfUser($repository, $user);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PullRequest $repository): bool
    {
        return isSelfUser($repository, $user);
    }

    public function restore(User $user, PullRequest $repository): bool
    {
        return isSelfUser($repository, $user);
    }

    public function forceDelete(User $user, PullRequest $repository): bool
    {
        return isSelfUser($repository, $user);
    }
}
