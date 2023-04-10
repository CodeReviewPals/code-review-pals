<?php

namespace App\Services\Github;

use Exception;
use App\Models\PullRequest;
use App\DTO\Github\Repository\PullRequest\PullRequestData;
use App\Http\Requests\PullRequest\StorePullRequestRequest;
use App\Actions\Github\PullRequest\FetchPullRequestInformation;

class PullRequestService
{
    /**
     * Check if pull request exist and update the existing one or create a new one.
     *
     * @param StorePullRequestRequest $request
     *
     * @return PullRequest|null
     */
    public function create(StorePullRequestRequest $request): ?PullRequest
    {
        $pullRequestData = $this->getDataFromUrl(url: $request->get('link'));

        if (!$pullRequestData) {
            return null;
        }

        return $request
            ->user()
            ->pullRequests()
            ->updateOrCreate([
                'node_id' => $pullRequestData->nodeId,
            ], $pullRequestData->toArray());
    }

    /**
     * Get extracted vars and call request to get the DTO object.
     *
     * @param string $url
     *
     * @return PullRequestData|null
     */
    public function getDataFromUrl(string $url): ?PullRequestData
    {
        [
            'username'          => $username,
            'repository'        => $repository,
            'pullRequestNumber' => $pullRequestNumber,
        ] = $this->getRegexMatch($url);

        try {
            return app(FetchPullRequestInformation::class)->execute(
                username: $username,
                repository: $repository,
                pullRequestNumber: $pullRequestNumber,
            )->dtoOrFail();
        } catch (Exception) {
            return null;
        }
    }

    /**
     * Extract variable from GitHub url with regex.
     *
     * @param string $url
     *
     * @return array
     */
    public function getRegexMatch(string $url): array
    {
        preg_match(
            pattern: config('regex.github.pull_request.url'),
            subject: $url,
            matches: $extraction,
        );

        return [
            'username'          => $extraction[1],
            'repository'        => $extraction[2],
            'pullRequestNumber' => $extraction[3],
        ];
    }
}