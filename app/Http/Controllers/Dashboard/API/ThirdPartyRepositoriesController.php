<?php

namespace App\Http\Controllers\Dashboard\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\API\StoreRepositoryFromThirdPartyRequest;
use App\Http\Resources\Dashboard\ThirdPartyRepositoryResource;
use App\Models\Repository;
use Illuminate\Http\Request;

class ThirdPartyRepositoriesController extends Controller
{

    /**
     * @todo
     *
     * @param Request $request
     * @param string $provider
     * @return \Response
     */
    public function index(Request $request, string $provider)
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


    /**
     * @todo implement
     *
     * @param StoreRepositoryFromThirdPartyRequest $request
     * @return void
     */
    public function store(StoreRepositoryFromThirdPartyRequest $request)
    {
        // fetch data
        // check if duplicate repository throw error
        // store repository
    }
}
