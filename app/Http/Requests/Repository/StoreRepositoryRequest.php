<?php

namespace App\Http\Requests\Repository;

use App\Models\Repository;
use Illuminate\Validation\Rule;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Http\FormRequest;

class StoreRepositoryRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'nodeId' => ['required', 'string'],
            'fullName' => [
                'required',
                'string',
                Rule::unique(Repository::class, 'full_name')->where(function (Builder $query) {
                    return $query
                        ->where('node_id', $this->get('nodeId'))
                        ->where('full_name', $this->get('fullName'))
                        ->whereNull('deleted_at');
                })
            ],
            'description' => ['nullable', 'string'],
            'language' => ['nullable', 'string'],
            'htmlUrl' => ['required', 'string'],
        ];
    }
}
