<?php

namespace App\Modules\WoodType\Interfaces\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateWoodTypeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $woodTypeId = $this->route('woodType');

        if (is_object($woodTypeId)) {
            $woodTypeId = $woodTypeId->id;
        }

        return [
            'code' => [
                'required',
                'string',
                'max:100',
                Rule::unique(
                    'wood_types',
                    'code'
                )->ignore($woodTypeId),
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
