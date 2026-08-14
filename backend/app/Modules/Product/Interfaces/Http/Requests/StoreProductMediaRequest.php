<?php

namespace App\Modules\Product\Interfaces\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductMediaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'media_type' => [
                'required',
                'in:IMAGE,VIDEO',
            ],

            'url' => [
                'required',
                'string',
                'max:2048',
            ],

            'youtube_video_id' => [
                'nullable',
                'string',
                'max:50',
            ],

            'is_thumbnail' => [
                'required',
                'boolean',
            ],

            'sort_order' => [
                'required',
                'integer',
                'min:0',
            ],
        ];
    }
}
