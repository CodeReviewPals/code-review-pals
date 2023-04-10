<?php

namespace App\Actions\Github;

use App\Http\Integrations\Github\GithubApiConnector;

trait GithubAction
{
    /**
     * @var GithubApiConnector
     */
    protected GithubApiConnector $connector;

    public function __construct()
    {
        $this->connector = new GithubApiConnector;
    }
}