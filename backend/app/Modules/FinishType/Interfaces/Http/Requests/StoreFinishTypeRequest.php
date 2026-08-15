<?php

namespace App\Modules\FinishType\Interfaces\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFinishTypeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'code' => [
                'required',
                'string',
                'max:100',
                'unique:finish_types,code',
            ],

            'name' => [
                'required',
                'string',
                'max:255',
            ],
        ];
    }
}
