<?php

namespace App\Services\Github;

use Exception;
use App\Models\PullRequest;
use App\Actions\Github\PullRequest\CreatePullRequest;
use App\Http\Requests\PullRequest\StorePullRequestRequest;
use App\DTO\Github\Repository\PullRequest\PullRequestData;
use App\Actions\Github\PullRequest\FetchPullRequestInformation;

class PullRequestService
{
    /**
     * Get extracted vars and call request to get the DTO object.
     *
     * @param string $url
     *
     * @return mixed
     */
    public function getDataFromUrl(string $url): mixed
    {
        [
            'username' => $username,
            'repository' => $repository,
            'pullRequestNumber' => $pullRequestNumber,
        ] = $this->getRegexMatch($url);

        try {
            return app(FetchPullRequestInformation::class)
                ->execute(
                    username: $username,
                    repository: $repository,
                    pullRequestNumber: $pullRequestNumber
                )
                ->dtoOrFail();
        } catch (Exception) {
            return null;
        }
    }

    /**
     * Extract variable from GitHub url with regex.
     *
     * @param string $url
     *
     * @return array<string, string>
     */
    public function getRegexMatch(string $url): array
    {
        preg_match(
            pattern: (string) config('regex.github.pull_request.url'),
            subject: $url,
            matches: $extraction
        );

        return [
            'username' => $extraction[1],
            'repository' => $extraction[2],
            'pullRequestNumber' => $extraction[3],
        ];
    }

    /**
     * @param StorePullRequestRequest $request
     *
     * @return PullRequest|null
     */
    public function createFromUrl(StorePullRequestRequest $request): ?PullRequest
    {
        if (!$request->user()) {
            exit();
        }

        $pullRequestData = $this->getDataFromUrl(url: (string) $request->get('link'));

        if (!$pullRequestData instanceof PullRequestData) {
            exit();
        }

        return app(CreatePullRequest::class)->execute(
            pullRequestData: $pullRequestData,
            user: $request->user()
        );
    }
}
