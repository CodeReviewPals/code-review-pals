<?php

namespace App\Http\Controllers\Dashboard\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\ThirdPartyRepositoryResource;
use Illuminate\Http\Request;

class ThirdPartyRepositoriesListController extends Controller
{

    /**
     * @todo
     *
     * @param Request $request
     * @param string $provider
     * @return void
     */
    public function __invoke(Request $request, string $provider)
    {
        $data = collect([
            json_decode(json_encode([
                "name" => "geeksesi/code-review-pals",
                "url" => "https://github.com/geeksesi/code-review-pals",
                "provider" => $provider
            ]), false)
        ]);
        return ThirdPartyRepositoryResource::collection($data);
    }
}
