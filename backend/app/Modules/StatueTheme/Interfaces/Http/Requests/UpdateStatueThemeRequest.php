<?php

namespace App\Modules\StatueTheme\Interfaces\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStatueThemeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $statueThemeId = $this->route('statueTheme');

        if (is_object($statueThemeId)) {
            $statueThemeId = $statueThemeId->id;
        }

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
                Rule::unique('statue_themes', 'code')
                    ->ignore($statueThemeId),
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
