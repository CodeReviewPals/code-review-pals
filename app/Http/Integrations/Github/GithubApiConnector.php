<?php

namespace App\Http\Integrations\Github;

use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AcceptsJson;

/**
 * @link https://docs.github.com/en/rest?apiVersion=2022-11-28 Documentation
 */
class GithubApiConnector extends Connector
{
    use AcceptsJson;

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
}
