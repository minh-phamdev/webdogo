<?php

namespace App\Modules\WoodType\Interfaces\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWoodTypeRequest extends FormRequest
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
                'unique:wood_types,code',
            ],

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'group_no' => [
                'nullable',
                'integer',
            ],

            'is_precious' => [
                'boolean',
            ],

            'is_restricted' => [
                'boolean',
            ],

            'description' => [
                'nullable',
                'string',
            ],
        ];
    }
}
