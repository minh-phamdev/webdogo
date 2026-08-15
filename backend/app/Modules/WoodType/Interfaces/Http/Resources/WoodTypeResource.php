<?php

namespace App\Modules\WoodType\Interfaces\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WoodTypeResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'name' => $this->name,
            'group_no' => $this->group_no,
            'is_precious' => $this->is_precious,
            'is_restricted' => $this->is_restricted,
            'description' => $this->description,
        ];
    }
}
