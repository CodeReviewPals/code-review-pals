<?php

namespace App\Resources\Repository;

use App\Models\Repository;
use Illuminate\Http\Request;
use App\Resources\ResourceCollection;

class RepositoryCollection extends ResourceCollection
{
    /**
     * @var string
     */
    public $collects = RepositoryResource::class;

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
                'viewAny' => $request->user()?->can('viewAny', Repository::class) ?? false,
                'create'  => $request->user()?->can('create', Repository::class) ?? false,
            ],
        ];
    }
}
