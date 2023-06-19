<?php

namespace App\Actions\Github\Webhook;

use App\Models\Webhook;
use ReflectionException;
use App\Models\Repository;
use Saloon\Contracts\Response;
use App\Actions\Github\GithubAction;
use Saloon\Exceptions\PendingRequestException;
use Saloon\Exceptions\InvalidResponseClassException;
use App\Http\Integrations\Github\Repository\Requests\GetRepositoryWebhooks;
use App\Models\PullRequest;

class FetchWebhook
{
    use GithubAction;

    /**
     * @throws InvalidResponseClassException
     * @throws ReflectionException
     * @throws PendingRequestException
     */
    public function execute(Webhook $webhook, Repository|PullRequest $model): Response
    {
        [
            'username' => $username,
            'repository' => $repository,
        ] = $this->getUsernameAndRepository($model);

        $request = new GetRepositoryWebhooks(
            username: $username,
            repository: $repository,
            hookId: $webhook->hook_id
        );

        return $this->connector->send($request);
    }

    public function getUsernameAndRepository(Repository|PullRequest $model): array
    {
        if ($model instanceof Repository) {
            return [
                'username' => $model->username,
                'repository' => $model->repository_name,
            ];
        }
        return app(PullRequestService::class)->getRegexMatch($model->html_url);
    }
}
