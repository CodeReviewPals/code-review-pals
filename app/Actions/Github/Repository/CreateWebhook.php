<?php

namespace App\Actions\Github\Repository;

use App\Models\Webhook;
use ReflectionException;
use App\Models\Repository;
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
    public function execute(Repository $repository): Response
    {
        $request = new CreateRepositoryWebhook(
            username: $repository->username,
            repository: $repository->repository,
            secret: $repository->node_id
        );

        return $this->connector->send($request);
    }
}
