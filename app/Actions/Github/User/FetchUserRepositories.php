<?php

namespace App\Actions\Github\User;

use ReflectionException;
use Saloon\Contracts\Response;
use App\Actions\Github\GithubAction;
use Saloon\Exceptions\PendingRequestException;
use Saloon\Exceptions\InvalidResponseClassException;
use App\Http\Integrations\Github\User\Requests\GetUserRepositories;

class FetchUserRepositories
{
    use GithubAction;

    /**
     * @throws InvalidResponseClassException
     * @throws ReflectionException
     * @throws PendingRequestException
     */
    public function execute(string $username): Response
    {
        $request = new GetUserRepositories(username: $username);

        return $this->connector->send($request);
    }
}
