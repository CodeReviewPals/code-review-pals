<?php

namespace App\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection as BaseResourceCollection;

class ResourceCollection extends BaseResourceCollection
{
    /**
     * Customize the pagination information for the resource.
     *
     * @param Request $request
     * @param array   $paginated
     * @param array   $default
     *
     * @return array
     */
    public function paginationInformation(Request $request, array $paginated, array $default): array
    {
        $default['links'] = collect($paginated['links']);

        return $default;
    }
}
