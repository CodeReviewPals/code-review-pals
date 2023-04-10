<?php

namespace App\Http\Integrations\Github\User\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Response;
use Spatie\LaravelData\DataCollection;
use App\DTO\Github\User\UserRepositoryData;

class GetUserRepositories extends Request
{
    /**
     * Define the HTTP method
     *
     * @var Method
     */
    protected Method $method = Method::GET;

    /**
     * @param string $username
     */
    public function __construct(protected string $username)
    {
    }

    /**
     * Define the endpoint for the request
     *
     * @return string
     */
    public function resolveEndpoint(): string
    {
        return '/users/' . $this->username . '/repos';
    }

    /**
     * @param Response $response
     *
     * @return DataCollection<int|string, UserRepositoryData>
     */
    public function createDtoFromResponse(Response $response): DataCollection
    {
        return UserRepositoryData::collection($response->collect());
    }
}
