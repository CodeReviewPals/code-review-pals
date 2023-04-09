<?php

namespace App\Services;

use App\Http\Integrations\Github\GithubApiConnector;
use App\Http\Integrations\Github\User\Requests\GetUserRepositories;

class RepositoryService
{
    public function getThirdPartyData(?string $provider = null, string $username): array
    {
        $output = [
            "active" => !is_null($provider),
            "provider" => $provider,
            "repositories" => []
        ];
        if (is_null($provider)) {
            return $output;
        }

        $repositoriesRequest = app(GetUserRepositories::class, ['username' => $username]);
        $githubConnector = app(GithubApiConnector::class)->send($repositoriesRequest);
        $repositories = $githubConnector->dto()->toArray();
        $output['repositories'] = $repositories;
        return $output;
    }
}
