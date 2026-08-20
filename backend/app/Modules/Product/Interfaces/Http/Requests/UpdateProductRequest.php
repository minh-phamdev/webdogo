<?php

namespace App\Modules\Product\Interfaces\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $productId = $this->route('product');

        if ($productId instanceof \App\Modules\Product\Infrastructure\Persistence\Models\ProductModel) {
            $productId = $productId->id;
        }

        return [
            'sku' => [
                'sometimes',
                'required',
                'string',
                'max:255',
                Rule::unique('products', 'sku')
                    ->ignore($productId),
            ],

            'group_id' => [
                'sometimes',
                'nullable',
                'integer',
                'exists:product_groups,id',
            ],

            'category_id' => [
                'sometimes',
                'required',
                'integer',
                'exists:categories,id',
            ],

            'theme_id' => [
                'sometimes',
                'required',
                'integer',
                'exists:statue_themes,id',
            ],

            'wood_type_id' => [
                'sometimes',
                'required',
                'integer',
                'exists:wood_types,id',
            ],

            'finish_id' => [
                'sometimes',
                'nullable',
                'integer',
                'exists:finish_types,id',
            ],

            'artisan_id' => [
                'sometimes',
                'nullable',
                'integer',
                'exists:artisans,id',
            ],

            'status_id' => [
                'sometimes',
                'required',
                'integer',
                'exists:product_statuses,id',
            ],

            'name' => [
                'sometimes',
                'required',
                'string',
                'max:255',
            ],

            'slug' => [
                'sometimes',
                'nullable',
                'string',
                'max:255',
                Rule::unique('products', 'slug')
                    ->ignore($productId),
            ],

            'description' => [
                'sometimes',
                'nullable',
                'string',
            ],

            'price' => [
                'sometimes',
                'required',
                'numeric',
                'min:0',
            ],

            'compare_at_price' => [
                'sometimes',
                'nullable',
                'numeric',
                'min:0',
            ],

            'height_cm' => [
                'sometimes',
                'required',
                'numeric',
                'min:0',
            ],

            'width_cm' => [
                'sometimes',
                'nullable',
                'numeric',
                'min:0',
            ],

            'depth_cm' => [
                'sometimes',
                'nullable',
                'numeric',
                'min:0',
            ],

            'weight_kg' => [
                'sometimes',
                'required',
                'numeric',
                'min:0',
            ],

            'is_unique' => [
                'sometimes',
                'required',
                'boolean',
            ],

            'is_handmade' => [
                'sometimes',
                'required',
                'boolean',
            ],

            'crafted_year' => [
                'sometimes',
                'nullable',
                'integer',
                'min:1900',
                'max:2100',
            ],

            'quantity' => [
                'sometimes',
                'required',
                'integer',
                'min:0',
            ],

            'reserved_quantity' => [
                'sometimes',
                'required',
                'integer',
                'min:0',
            ],

            'lead_time_days' => [
                'sometimes',
                'nullable',
                'integer',
                'min:0',
            ],
        ];
    }
}
