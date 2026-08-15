<?php

namespace App\Modules\Artisan\Interfaces\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArtisanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->roles()
            ->where('code', 'ADMIN')
            ->exists() ?? false;
    }

    public function rules(): array
    {
        return [
            'full_name' => [
                'sometimes',
                'required',
                'string',
                'max:255',
            ],

            'craft_village' => [
                'sometimes',
                'nullable',
                'string',
                'max:255',
            ],

            'years_exp' => [
                'sometimes',
                'nullable',
                'integer',
                'min:0',
            ],

            'bio' => [
                'sometimes',
                'nullable',
                'string',
            ],

            'avatar_url' => [
                'sometimes',
                'nullable',
                'string',
                'max:255',
            ],

            'is_active' => [
                'sometimes',
                'boolean',
            ],
        ];
    }
}
