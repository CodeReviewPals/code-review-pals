<?php

namespace App\Actions\Github\PullRequest;

use ReflectionException;
use Saloon\Contracts\Response;
use App\Actions\Github\GithubAction;
use Saloon\Exceptions\PendingRequestException;
use Saloon\Exceptions\InvalidResponseClassException;
use App\Http\Integrations\Github\PullRequest\Requests\GetPullRequestInformation;

class FetchPullRequestInformation
{
    use GithubAction;

    /**
     * @throws ReflectionException
     * @throws InvalidResponseClassException
     * @throws PendingRequestException
     */
    public function execute(
        string $username,
        string $repository,
        int|string $pullRequestNumber
    ): Response {
        $request = new GetPullRequestInformation(
            username: $username,
            repository: $repository,
            pullRequestNumber: $pullRequestNumber
        );

        return $this->connector->send($request);
    }
}
