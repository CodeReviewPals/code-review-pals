<?php

namespace App\Actions\Github\User;

use ReflectionException;
use Saloon\Contracts\Response;
use Saloon\Exceptions\PendingRequestException;
use App\Http\Integrations\Github\GithubApiConnector;
use Saloon\Exceptions\InvalidResponseClassException;
use App\Http\Integrations\Github\User\Requests\GetUserRepositories;

class FetchUserRepositories
{
    /**
     * @throws InvalidResponseClassException
     * @throws ReflectionException
     * @throws PendingRequestException
     */
    public function execute(
        string $username,
    ): Response
    {
        $connector = new GithubApiConnector;

        $request = new GetUserRepositories(
            username: $username,
        );

        return $connector->send($request);
    }
}