<?php

namespace App\Actions\Repository;

use App\Actions\Github\Repository\FetchRepository;
use App\DTO\Github\Repository\RepositoryData;
use App\DTO\RepositoryData as DTORepositoryData;
use App\Models\PullRequest;
use App\Models\Repository;
use App\Services\Github\PullRequestService;
use App\Services\Repository\RepositoryService;

class CreateRepositoryByPullRequest
{
    public function __construct(protected RepositoryService $repositoryService)
    {
    }

    /**
     * @param PullRequest $pullRequest
     *
     * @return Repository
     */
    public function execute(PullRequest $pullRequest): Repository
    {
        $repository = $this->repositoryService->isRegistered($pullRequest->repository);
        if ($repository) {
            return $repository;
        }

        [
            'username' => $username,
            'repository' => $repository,
        ] = app(PullRequestService::class)->getRegexMatch($pullRequest->html_url);

        $repository = app(FetchRepository::class)
            ->execute($username, $repository)
            ->dtoOrFail();

        $repositoryData = RepositoryData::from($repository);
        $data = DTORepositoryData::from($repositoryData)->toArray();
        $data['user_id'] = $pullRequest->user_id;
        $data['owner_third_party_id'] = $repositoryData->owner->id;
        $repository = Repository::withTrashed()->updateOrCreate(
            [
                'node_id' => $data['node_id'],
                'full_name' => $data['full_name'],
            ],
            $data
        );
        $repository->restore();
        return $repository;
    }
}
