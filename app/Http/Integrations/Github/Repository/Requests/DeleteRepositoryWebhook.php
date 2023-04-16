<?php

namespace App\Http\Integrations\Github\Repository\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * @link https://docs.github.com/en/rest/webhooks/repos#create-a-repository-webhook Documentation
 */
class DeleteRepositoryWebhook extends Request
{
    /**
     * Define the HTTP method
     *
     * @var Method
     */
    protected Method $method = Method::DELETE;

    public function __construct(
        public string $username,
        public string $repository,
        public string $hookId,
    ) {}

    /**
     * Define the endpoint for the request
     *
     * @return string
     */
    public function resolveEndpoint(): string
    {
        return "/repos/{$this->username}/{$this->repository}/hooks/{$this->hookId}";
    }
}
