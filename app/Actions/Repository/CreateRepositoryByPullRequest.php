<?php

namespace App\Actions\Repository;

use App\Actions\Github\Repository\FetchRepositoryByFullName;
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
        $repository = app(FetchRepositoryByFullName::class)
            ->execute($pullRequest->repository)
            ->dtoOrFail();

        $repositoryData = RepositoryData::from($repository);
        $data = DTORepositoryData::from($repositoryData)->toArray();
        $data['user_id'] = $pullRequest->user_id;
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
