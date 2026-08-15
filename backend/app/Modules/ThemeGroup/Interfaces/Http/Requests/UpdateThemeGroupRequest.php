<?php

namespace App\Modules\ThemeGroup\Interfaces\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateThemeGroupRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $themeGroupId = $this->route('themeGroup')->id;

        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique(
                    'theme_groups',
                    'name'
                )->ignore($themeGroupId),
            ],

            'code' => [
                'required',
                'string',
                'max:100',
                Rule::unique(
                    'theme_groups',
                    'code'
                )->ignore($themeGroupId),
            ],
        ];
    }
}
