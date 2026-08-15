<?php

namespace App\Modules\ProductStatus\Interfaces\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductStatusRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $productStatusId = $this->route('productStatus');

        if (is_object($productStatusId)) {
            $productStatusId = $productStatusId->id;
        }

        return [
            'code' => [
                'required',
                'string',
                'max:100',
                Rule::unique(
                    'product_statuses',
                    'code'
                )->ignore($productStatusId),
            ],

            'name' => [
                'required',
                'string',
                'max:255',
            ],
        ];
    }
}
