<?php

namespace App\Http\Integrations\Github\Repository\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Response;
use Spatie\LaravelData\DataCollection;
use App\DTO\Github\Repository\PullRequest\PullRequestData;

/**
 * @link https://docs.github.com/en/rest/pulls/pulls?apiVersion=2022-11-28#list-pull-requests Documentation
 */
class GetAllPullRequest extends Request
{
    /**
     * Define the HTTP method
     *
     * @var Method
     */
    protected Method $method = Method::GET;

    public function __construct(public string $username, public string $repository)
    {
    }

    /**
     * Define the endpoint for the request
     *
     * @return string
     */
    public function resolveEndpoint(): string
    {
        return '/repos/' . $this->username . '/' . $this->repository . '/pulls';
    }

    /**
     * @param Response $response
     *
     * @return DataCollection<int, PullRequestData>
     */
    public function createDtoFromResponse(Response $response): DataCollection
    {
        return PullRequestData::collection($response->json());
    }
}
