<?php

namespace App\Actions\Github\Repository;

use App\Models\Webhook;
use ReflectionException;
use App\Models\Repository;
use Saloon\Contracts\Response;
use App\Actions\Github\GithubAction;
use Saloon\Exceptions\PendingRequestException;
use Saloon\Exceptions\InvalidResponseClassException;
use App\Http\Integrations\Github\Repository\Requests\DeleteRepositoryWebhook;

class DeleteWebhookFromRepository
{
    use GithubAction;

    /**
     * @throws InvalidResponseClassException
     * @throws ReflectionException
     * @throws PendingRequestException
     */
    public function execute(Webhook $webhook): Response {
        $request = new DeleteRepositoryWebhook(
            username: $webhook->webhookable->username,
            repository: $webhook->webhookable->repository,
            hookId: $webhook->hook_id,
        );

        $request->withTokenAuth($webhook->webhookable->user->github_token);

        $webhook->delete();

        return $this->connector->send($request);
    }
}
