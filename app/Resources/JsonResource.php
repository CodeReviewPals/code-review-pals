<?php

namespace App\Resources;

use Illuminate\Http\Request;
use App\Concerns\Model\HasPermissions;
use \Illuminate\Http\Resources\Json\JsonResource as BaseJsonResource;

class JsonResource extends BaseJsonResource
{
    public function toArray(Request $request)
    {
        $array = parent::toArray($request);

        if (in_array(HasPermissions::class, class_uses_recursive($this->resource), true)) {
            return $array + $this->resource->permissions();
        }

        return $array;
    }
}
