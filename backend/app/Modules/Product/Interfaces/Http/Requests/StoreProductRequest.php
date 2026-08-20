<?php

namespace App\Modules\Product\Interfaces\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'sku' => [
                'required',
                'string',
                'max:255',
                'unique:products,sku',
            ],

            'group_id' => [
                'nullable',
                'integer',
                'exists:product_groups,id',
            ],

            'category_id' => [
                'required',
                'integer',
                'exists:categories,id',
            ],

            'theme_id' => [
                'required',
                'integer',
                'exists:statue_themes,id',
            ],

            'wood_type_id' => [
                'required',
                'integer',
                'exists:wood_types,id',
            ],

            'finish_id' => [
                'nullable',
                'integer',
                'exists:finish_types,id',
            ],

            'artisan_id' => [
                'nullable',
                'integer',
                'exists:artisans,id',
            ],

            'status_id' => [
                'required',
                'integer',
                'exists:product_statuses,id',
            ],

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'slug' => [
                'nullable',
                'string',
                'max:255',
                'unique:products,slug',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'price' => [
                'required',
                'numeric',
                'min:0',
            ],

            'compare_at_price' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'height_cm' => [
                'required',
                'numeric',
                'min:0',
            ],

            'width_cm' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'depth_cm' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'weight_kg' => [
                'required',
                'numeric',
                'min:0',
            ],

            'is_unique' => [
                'required',
                'boolean',
            ],

            'is_handmade' => [
                'required',
                'boolean',
            ],

            'crafted_year' => [
                'nullable',
                'integer',
                'min:1900',
                'max:2100',
            ],

            'quantity' => [
                'required',
                'integer',
                'min:0',
            ],

            'reserved_quantity' => [
                'required',
                'integer',
                'min:0',
                'lte:quantity',
            ],

            'lead_time_days' => [
                'nullable',
                'integer',
                'min:0',
            ],
        ];
    }
}
