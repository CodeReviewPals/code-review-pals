<?php

namespace App\Http\Requests\PullRequest;

use App\Rules\Github\PullRequestLink;
use Illuminate\Foundation\Http\FormRequest;

class StorePullRequestRequest extends FormRequest
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
     * @return array<string, array<int, mixed>>
     */
    public function rules(): array
    {
        return [
            'link' => ['required', new PullRequestLink()],
        ];
    }
}
