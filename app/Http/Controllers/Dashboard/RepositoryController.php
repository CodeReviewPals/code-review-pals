<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRepositoryRequest;
use App\Http\Requests\UpdateRepositoryRequest;
use App\Models\Repository;
use Inertia\Inertia;

class RepositoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $repositories = Repository::paginate();
        return Inertia::render('Dashboard/Repository/index', ["repository" => $repositories]);
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
