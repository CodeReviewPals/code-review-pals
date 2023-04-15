<?php

namespace App\Http\Integrations\Github\Repository\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Response;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use Saloon\Contracts\Authenticator;
use Illuminate\Support\Facades\Auth;
use Saloon\Http\Auth\TokenAuthenticator;
use App\DTO\Github\Repository\Webhook\WebhookCreatedData;

/**
 * @link https://docs.github.com/en/rest/webhooks/repos#create-a-repository-webhook Documentation
 */
class CreateRepositoryWebhook extends Request implements HasBody
{
    use HasJsonBody;

    /**
     * Define the HTTP method
     *
     * @var Method
     */
    protected Method $method = Method::POST;

    public function __construct(
        public string $username,
        public string $repository,
        private readonly string $secret,
    ) {}

    /**
     * Define the endpoint for the request
     *
     * @return string
     */
    public function resolveEndpoint(): string
    {
        return "/repos/{$this->username}/{$this->repository}/hooks";
    }

    /**
     * @return array
     */
    protected function defaultBody(): array
    {
        return [
            'name'   => 'web',
            'active' => true,
            'events' => [
                '*',
            ],
            'config' => [
                'secret'       => $this->secret,
                'url'          => route('webhooks.github.repository'),
                'content_type' => 'json',
            ],
        ];
    }

    /**
     * @param Response $response
     *
     * @return WebhookCreatedData
     */
    public function createDtoFromResponse(Response $response): WebhookCreatedData
    {
        return WebhookCreatedData::from($response->collect());
    }
}
