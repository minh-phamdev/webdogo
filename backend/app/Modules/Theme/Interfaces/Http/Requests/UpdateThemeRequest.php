<?php

namespace App\Modules\Theme\Interfaces\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateThemeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $themeId = $this->route('theme')?->id;

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
                Rule::unique('themes', 'code')
                    ->ignore($themeId),
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
