<?php

namespace App\Http\Requests\Dashboard\API;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRepositoryFromThirdPartyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // @todo validation who has access to the repository
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $providerList = ["github"];
        return [
            "name" => ["required", 'string'],
            "url" => ["required", 'string'],
            "provider" => ["required", 'string', Rule::in($providerList)]
        ];
    }
}
