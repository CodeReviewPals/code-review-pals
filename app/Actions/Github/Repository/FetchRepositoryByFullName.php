<?php

namespace App\Actions\Github\Repository;

use ReflectionException;
use Saloon\Contracts\Response;
use App\Actions\Github\GithubAction;
use Saloon\Exceptions\PendingRequestException;
use Saloon\Exceptions\InvalidResponseClassException;
use App\Http\Integrations\Github\PullRequest\Requests\GetPullRequestInformation;
use App\Http\Integrations\Github\Repository\Requests\GetRepositoryInformation;

class FetchRepositoryByFullName
{
    use GithubAction;

    /**
     * @throws ReflectionException
     * @throws InvalidResponseClassException
     * @throws PendingRequestException
     */
    public function execute(string $fullName): Response
    {
        [$username, $repository] = explode('/', $fullName);
        $request = new GetRepositoryInformation(username: $username, repository: $repository);

        return $this->connector->send($request);
    }
}
