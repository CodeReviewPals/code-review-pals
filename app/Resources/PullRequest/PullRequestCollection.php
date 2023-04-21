<?php

namespace App\Resources\PullRequest;

use App\Models\PullRequest;
use Illuminate\Http\Request;
use App\Resources\ResourceCollection;

class PullRequestCollection extends ResourceCollection
{
    /**
     * @var string
     */
    public $collects = PullRequestResource::class;

    /**
     * Transform the resource collection into an array.
     *
     * @param Request $request
     *
     * @return array
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection,
            'can'  => [
                'viewAny' => $request->user()?->can('viewAny', PullRequest::class) ?? false,
                'create'  => $request->user()?->can('create', PullRequest::class) ?? false,
            ],
        ];
    }
}
