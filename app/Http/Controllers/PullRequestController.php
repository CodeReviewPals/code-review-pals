<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\PullRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Services\Github\PullRequestService;
use App\Http\Requests\PullRequest\StorePullRequestRequest;

class PullRequestController extends Controller
{
    public function __construct(protected PullRequestService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $pullRequests = PullRequest::paginate();

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
        $this->service->create($request);

        return to_route('pull-requests.index');
    }
}
