<?php

namespace App\Modules\ThemeGroup\Interfaces\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreThemeGroupRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:theme_groups,name',
            ],

            'code' => [
                'required',
                'string',
                'max:100',
                'unique:theme_groups,code',
            ],
        ];
    }
}
