<?php

namespace App\Modules\Theme\Interfaces\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ThemeResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'theme_group_id' => $this->theme_group_id,
            'code' => $this->code,
            'name' => $this->name,
            'meaning' => $this->meaning,

            'theme_group' => $this->whenLoaded(
                'themeGroup'
            ),
        ];
    }
}
