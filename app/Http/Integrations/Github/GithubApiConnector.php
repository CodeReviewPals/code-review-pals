<?php

namespace App\Http\Integrations\Github;

use Saloon\Http\Connector;
use Saloon\Contracts\Authenticator;
use Saloon\Traits\Plugins\AcceptsJson;
use Saloon\Http\Auth\BasicAuthenticator;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

/**
 * @link https://docs.github.com/en/rest?apiVersion=2022-11-28 Documentation
 */
class GithubApiConnector extends Connector
{
    use AcceptsJson,
        AlwaysThrowOnErrors;

    /**
     * The Base URL of the API
     *
     * @return string
     */
    public function resolveBaseUrl(): string
    {
        return (string)config('github.api.base_path');
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
     * @return Authenticator|null
     */
    protected function defaultAuth(): ?Authenticator
    {
        return new BasicAuthenticator(
            username: (string)config('services.github.client_id'),
            password: (string)config('services.github.client_secret'),
        );
    }
}
