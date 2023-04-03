<?php

namespace App\Http\Integrations\Github\PullRequest\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Response;
use App\DTO\Github\Repository\PullRequest\PullRequestData;

/**
 * @link https://docs.github.com/en/rest/pulls/pulls?apiVersion=2022-11-28#get-a-pull-request Documentation
 */
class GetPullRequestInformation extends Request
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
        public int    $pullRequestNumber,
    ) {}

    /**
     * Define the endpoint for the request
     *
     * @return string
     */
    public function resolveEndpoint(): string
    {
        return '/repos/' . $this->username . '/' . $this->repository . '/pulls/' . $this->pullRequestNumber;
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
     * @return PullRequestData
     */
    public function createDtoFromResponse(Response $response): PullRequestData
    {
        return PullRequestData::from($response->collect());
    }
}
