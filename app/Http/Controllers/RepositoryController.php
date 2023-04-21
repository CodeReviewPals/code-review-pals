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

        $request
            ->user()
            ->repositories()
            ->withTrashed()
            ->updateOrCreate([
                'node_id'   => $data->nodeId,
                'full_name' => $data->fullName,
            ], $data->toArray(),
            )->restore();

        return to_route('repositories.index');
    }

    /**
     * Remove the specified resource.
     *
     * @param Repository $repository
     *
     * @return RedirectResponse
     */
    public function destroy(Repository $repository): RedirectResponse
    {
        $this->authorize('delete', $repository);

        $repository->delete();

        return to_route('repositories.index');
    }
}
