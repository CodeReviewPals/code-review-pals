<?php

namespace App\Http\Integrations\Github\Repository\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Response;
use App\DTO\Github\Repository\RepositoryData;

/**
 * @link https://docs.github.com/en/rest/repos/repos?apiVersion=2022-11-28#get-a-repository Documentation
 */
class GetRepositoryInformation extends Request
{
    /**
     * Define the HTTP method
     *
     * @var Method
     */
    protected Method $method = Method::GET;

    public function __construct(
        public string $username,
        public string $repository,
    ) {}

    /**
     * Define the endpoint for the request
     *
     * @return string
     */
    public function resolveEndpoint(): string
    {
        return '/repos/' . $this->username . '/' . $this->repository;
    }

    /**
     * @return string[]
     */
    protected function defaultHeaders(): array
    {
        return [
            'accept' => 'application/vnd.github+json',
        ];
    }

    /**
     * @param Response $response
     *
     * @return RepositoryData
     */
    public function createDtoFromResponse(Response $response): RepositoryData
    {
        return RepositoryData::from($response->collect());
    }
}
