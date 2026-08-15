<?php

namespace App\Modules\ProductGroup\Interfaces\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductGroupRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->roles()
            ->where('code', 'ADMIN')
            ->exists() ?? false;
    }

    public function rules(): array
    {
        $productGroupId = $this->route('productGroup');

        if ($productGroupId instanceof \App\Modules\ProductGroup\Infrastructure\Persistence\Models\ProductGroupModel) {
            $productGroupId = $productGroupId->id;
        }

        return [
            'name' => [
                'sometimes',
                'required',
                'string',
                'max:255',
            ],

            'slug' => [
                'sometimes',
                'required',
                'string',
                'max:255',
                Rule::unique(
                    'product_groups',
                    'slug'
                )->ignore($productGroupId),
                'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
            ],
        ];
    }
}
