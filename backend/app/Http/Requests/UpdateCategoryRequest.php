<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->roles()
            ->where('code', 'ADMIN')
            ->exists() ?? false;
    }

    public function rules(): array
    {
        $categoryId = $this->route('category');

        return [
            'parent_id' => [
                'nullable',
                'integer',
                'exists:categories,id',
                Rule::notIn([$categoryId]),
            ],

            'name' => [
                'sometimes',
                'required',
                'string',
                'max:255',
                Rule::unique('categories', 'name')
                    ->ignore($categoryId),
            ],

            'slug' => [
                'sometimes',
                'required',
                'string',
                'max:255',
                Rule::unique('categories', 'slug')
                    ->ignore($categoryId),
                'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
            ],

            'sort_order' => [
                'sometimes',
                'integer',
                'min:0',
            ],

            'is_active' => [
                'sometimes',
                'boolean',
            ],
        ];
    }
}
