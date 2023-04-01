<?php

namespace App\Http\Integrations\Github;

use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AcceptsJson;

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
}
