<?php

namespace App\Policies;

use App\Models\PullRequest;
use App\Models\User;
use Illuminate\Auth\Access\Response;

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

    public function update(): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PullRequest $pullRequest): bool
    {
        return $pullRequest->user_id === $user->id;
    }

    public function restore(): bool
    {
        return true;
    }

    public function forceDelete(): bool
    {
        return true;
    }
}
