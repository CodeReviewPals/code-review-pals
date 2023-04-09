<?php

namespace App\Http\Integrations\Github\User\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Response;
use App\DTO\Github\User\GithubUserData;

class GetUserInformation extends Request
{
    /**
     * Define the HTTP method
     *
     * @var Method
     */
    protected Method $method = Method::GET;

    public function __construct(
        protected string $username,
    ) {}

    /**
     * Define the endpoint for the request
     *
     * @return string
     */
    public function resolveEndpoint(): string
    {
        return '/users/' . $this->username;
    }

    /**
     * @param Response $response
     *
     * @return GithubUserData
     */
    public function createDtoFromResponse(Response $response): GithubUserData
    {
        return GithubUserData::from($response->collect());
    }
}
