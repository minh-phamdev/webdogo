<?php

namespace App\Modules\Artisan\Interfaces\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArtisanRequest extends FormRequest
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
                'required',
                'string',
                'max:255',
            ],

            'craft_village' => [
                'nullable',
                'string',
                'max:255',
            ],

            'years_exp' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'bio' => [
                'nullable',
                'string',
            ],

            'avatar_url' => [
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
