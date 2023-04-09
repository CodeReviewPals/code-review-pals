<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rules\Enum;
use App\Enums\Auth\SocialiteProvider;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ThirdPartyRepositioriesListRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'username' => [
                'string',
                'required',
            ],
            'provider' => [
                'required',
                new Enum(SocialiteProvider::class),
            ],
        ];
    }
}
