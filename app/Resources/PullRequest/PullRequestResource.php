<?php

namespace App\Resources\PullRequest;

use Illuminate\Http\Request;
use App\Resources\JsonResource;

class PullRequestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
