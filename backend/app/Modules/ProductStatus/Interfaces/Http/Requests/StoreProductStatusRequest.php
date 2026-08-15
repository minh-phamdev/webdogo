<?php

namespace App\Modules\ProductStatus\Interfaces\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductStatusRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'code' => ['required', 'string', 'max:30', 'unique:product_statuses,code'],
            'name' => ['required', 'string', 'max:50'],
        ];
    }
}
