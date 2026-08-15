<?php

namespace App\Modules\StatueTheme\Interfaces\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStatueThemeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'theme_group_id' => [
                'nullable',
                'integer',
                'exists:theme_groups,id',
            ],

            'code' => [
                'required',
                'string',
                'max:100',
                'unique:statue_themes,code',
            ],

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'meaning' => [
                'nullable',
                'string',
            ],
        ];
    }
}
