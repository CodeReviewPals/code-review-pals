<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\Repository;
use App\Http\Controllers\Controller;
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

            $repositories = app(FetchUserRepositories::class)
                ->execute($request->get('username'))
                ->dtoOrFail();

            // Remove already existing repositories.
            $data = collect($repositories)
                ->reject(fn($repository) => in_array($repository['nodeId'], $nodeIds, true))
                ->values()
                ->toJson();
        } catch (Exception) {
            $data = '[]';
        }

        return $data;
    }
}
