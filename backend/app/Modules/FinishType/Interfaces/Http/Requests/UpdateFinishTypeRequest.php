<?php

namespace App\Modules\FinishType\Interfaces\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateFinishTypeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $finishTypeId = $this->route('finishType');

        if (is_object($finishTypeId)) {
            $finishTypeId = $finishTypeId->id;
        }

        return [
            'code' => [
                'required',
                'string',
                'max:100',
                Rule::unique('finish_types', 'code')
                    ->ignore($finishTypeId),
            ],

            'name' => [
                'required',
                'string',
                'max:255',
            ],
        ];
    }
}
