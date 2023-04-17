<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Repository;
use App\DTO\RepositoryData;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Repository\StoreRepositoryRequest;

class RepositoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $repositories = Repository::paginate();

        return Inertia::render('Repositories/RepositoryIndex', [
            'repositories' => $repositories,
        ]);
    }

    /**
     * @param StoreRepositoryRequest $request
     *
     * @return RedirectResponse
     */
    public function store(StoreRepositoryRequest $request): RedirectResponse
    {
        $data = RepositoryData::from($request->validated());

        try {
            $request
                ->user()
                ->repositories()
                ->create($data->toArray());

        } catch (\Illuminate\Database\QueryException $th) {
            // Check if the node_id already exists, if so we restore the repository.
            $repository = Repository::query()
                ->where('node_id', $data->nodeId)
                ->onlyTrashed()
                ->first();

            throw_if(!$repository, $th);

            $repository->restore();
            $repository->update($data->toArray());
        }

        return to_route('repositories.index');
    }
}
