<?php

namespace App\Http\Integrations\Github;

use Saloon\Http\Connector;
use Illuminate\Support\Facades\Auth;
use Saloon\Traits\Plugins\AcceptsJson;
use Saloon\Http\Auth\BasicAuthenticator;
use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

/**
 * @link https://docs.github.com/en/rest?apiVersion=2022-11-28 Documentation
 */
class GithubApiConnector extends Connector
{
    use AcceptsJson, AlwaysThrowOnErrors;

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
     * @return TokenAuthenticator|BasicAuthenticator
     */
    protected function defaultAuth(): TokenAuthenticator|BasicAuthenticator
    {
        if (Auth::check()) {
            return new TokenAuthenticator(Auth::user()->github_token);
        }

        return new BasicAuthenticator(
            username: (string)config('services.github.client_id'),
            password: (string)config('services.github.client_secret')
        );
    }
}
