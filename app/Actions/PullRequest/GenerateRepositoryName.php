<?php

namespace App\Actions\PullRequest;

use App\Models\PullRequest;
use App\Services\Github\PullRequestService;

class GenerateRepositoryName
{
    /**
     * @param PullRequest $pullRequest
     *
     * @return bool
     */
    public function execute(PullRequest $pullRequest): bool
    {
        [
            'username' => $username,
            'repository' => $repository,
        ] = app(PullRequestService::class)->getRegexMatch($pullRequest->html_url);

        return $pullRequest->updateQuietly([
            'repository' => "${username}/${repository}",
        ]);
    }
}
