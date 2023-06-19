<?php

namespace App\Http\Integrations\Discord;

use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AcceptsJson;
use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

/**
 * @link https://discord.com/developers/docs/intro Documentation
 */
class DiscordAPIConnector extends Connector
{
    use AcceptsJson, AlwaysThrowOnErrors;

    /**
     * The Base URL of the API
     *
     * @return string
     */
    public function resolveBaseUrl(): string
    {
        return (string)config('services.discord.base_path');
    }

    /**
     * @return string[]
     */
    protected function defaultHeaders(): array
    {
        return [
            'accept'       => 'application/json',
            'Content-Type' => 'application/json',
        ];
    }

    /**
     * @return TokenAuthenticator
     */
    protected function defaultAuth(): TokenAuthenticator
    {
        return new TokenAuthenticator(
            token: (string)config('services.discord.bot_token'),
            prefix: 'Bot'
        );
    }
}
