<?php

namespace App\Resources\Repository;

use Illuminate\Http\Request;
use App\Resources\JsonResource;

class RepositoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
