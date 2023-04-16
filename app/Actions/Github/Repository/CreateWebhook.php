<?php

namespace App\Actions\Github\Repository;

use ReflectionException;
use Saloon\Contracts\Response;
use App\Actions\Github\GithubAction;
use Saloon\Exceptions\PendingRequestException;
use Saloon\Exceptions\InvalidResponseClassException;
use App\Http\Integrations\Github\Repository\Requests\CreateRepositoryWebhook;

class CreateWebhook
{
    use GithubAction;

    /**
     * @throws InvalidResponseClassException
     * @throws ReflectionException
     * @throws PendingRequestException
     */
    public function execute(
        string $username,
        string $repository,
        string $secret,
    ): Response {
        $request = new CreateRepositoryWebhook(
            username: $username,
            repository: $repository,
            secret: $secret,
        );

        return $this->connector->send($request);
    }
}
