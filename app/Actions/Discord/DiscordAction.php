<?php

namespace App\Actions\Discord;

use App\Http\Integrations\Discord\DiscordAPIConnector;

trait DiscordAction
{
    protected DiscordAPIConnector $connector;

    public function __construct()
    {
        $this->connector = new DiscordAPIConnector;
    }
}
