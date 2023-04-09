<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRepositoryRequest;
use App\Http\Requests\UpdateRepositoryRequest;
use App\Models\Repository;
use App\Services\RepositoryService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RepositoryController extends Controller
{

    public function __construct(private RepositoryService $repositoryService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $repositories = Repository::where('user_id', auth()->user()->id)->paginate();
        $thirdParyProvider = $request->get('third_party_provider', null);
        $thirdPary = $this->repositoryService->getThirdPartyData($thirdParyProvider, auth()->user()->name);
        return Inertia::render('Dashboard/Repository/index', ["repositories" => $repositories, "thirdParty" => $thirdPary]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRepositoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Repository $repository)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Repository $repository)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRepositoryRequest $request, Repository $repository)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Repository $repository)
    {
        //
    }
}
