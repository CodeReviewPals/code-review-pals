<?php

namespace App\Actions\Github\Repository;

use ReflectionException;
use Saloon\Contracts\Response;
use App\Actions\Github\GithubAction;
use Saloon\Exceptions\PendingRequestException;
use Saloon\Exceptions\InvalidResponseClassException;
use App\Http\Integrations\Github\Repository\Requests\GetAllPullRequestFromRepository;

class GetAllPullRequest
{
    use GithubAction;

    /**
     * @param string $username
     * @param string $repository
     *
     * @return Response
     * @throws ReflectionException
     * @throws InvalidResponseClassException
     * @throws PendingRequestException
     */
    public function execute(
        string $username,
        string $repository,
    ): Response
    {
        $request = new GetAllPullRequestFromRepository(
            username: $username,
            repository: $repository,
        );

        return $this->connector->send($request);
    }
}