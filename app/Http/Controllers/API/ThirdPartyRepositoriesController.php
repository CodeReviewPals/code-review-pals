<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\Repository;
use App\DTO\RepositoryData;
use App\Http\Controllers\Controller;
use Spatie\LaravelData\DataCollection;
use App\DTO\Github\User\UserRepositoryData;
use App\Actions\Github\User\FetchUserRepositories;
use App\Http\Requests\Api\ThirdPartyRepositioriesListRequest;

class ThirdPartyRepositoriesController extends Controller
{
    /**
     * @param ThirdPartyRepositioriesListRequest $request
     *
     * @return string
     */
    public function __invoke(ThirdPartyRepositioriesListRequest $request): string
    {
        try {
            $nodeIds = Repository::pluck('node_id')->toArray();

            /** @var DataCollection<int, RepositoryData> $repositories */
            $repositories = app(FetchUserRepositories::class)
                ->execute(username: (string) $request->get('username'))
                ->dtoOrFail();

            // Remove already existing repositories.
            $data = $repositories
                ->toCollection()
                ->reject(fn($repository) => in_array($repository->nodeId, $nodeIds, true))
                ->values()
                ->toJson();
        } catch (Exception) {
            $data = '[]';
        }

        return $data;
    }
}
