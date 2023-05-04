<?php

namespace App\Actions\PullRequest;

use App\Models\PullRequest;
use App\Services\Github\PullRequestService;

class GenerateRepositoryName
{
    /**
     * @param PullRequest $pullRequest
     *
     * @return string
     */
    public function execute(PullRequest $pullRequest): string
    {
        [
            'username' => $username,
            'repository' => $repository,
        ] = app(PullRequestService::class)->getRegexMatch($pullRequest->html_url);

        return sprintf('%s/%s', $username, $repository);
    }
}
