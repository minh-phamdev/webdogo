<?php

namespace App\Modules\Product\Interfaces\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductMediaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'media_type' => [
                'sometimes',
                'in:IMAGE,VIDEO',
            ],

            'url' => [
                'sometimes',
                'string',
                'max:2048',
            ],

            'youtube_video_id' => [
                'nullable',
                'string',
                'max:50',
            ],

            'is_thumbnail' => [
                'sometimes',
                'boolean',
            ],

            'sort_order' => [
                'sometimes',
                'integer',
                'min:0',
            ],
        ];
    }
}
