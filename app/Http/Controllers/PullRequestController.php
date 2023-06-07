<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\PullRequest;
use Illuminate\Http\RedirectResponse;
use App\Services\Github\PullRequestService;
use App\Resources\PullRequest\PullRequestCollection;
use App\Http\Requests\PullRequest\StorePullRequestRequest;

class PullRequestController extends Controller
{
    public function __construct(protected PullRequestService $service)
    {
        $this->authorizeResource(PullRequest::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $pullRequests = new PullRequestCollection(PullRequest::paginate());

        return Inertia::render('PullRequests/PullRequestIndex', [
            'pullRequests' => $pullRequests,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('PullRequests/PullRequestCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePullRequestRequest $request): RedirectResponse
    {
        if (!$request->user()) {
            exit();
        }

        $this->service->createFromUrl((string) $request->get('link'), $request->user());

        return to_route('pull-requests.index');
    }

    /**
     * Remove the specified resource.
     *
     * @param PullRequest $pullRequest
     *
     * @return RedirectResponse
     */
    public function destroy(PullRequest $pullRequest): RedirectResponse
    {
        $pullRequest->delete();

        return to_route('pull-requests.index');
    }
}
