<?php

namespace App\Modules\Artisan\Interfaces\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArtisanResource extends JsonResource
{
    public function toArray(
        Request $request
    ): array {
        return [
            'id' => $this->id,
            'full_name' => $this->full_name,
            'craft_village' => $this->craft_village,
            'years_exp' => $this->years_exp,
            'bio' => $this->bio,
            'avatar_url' => $this->avatar_url,
            'is_active' => $this->is_active,
        ];
    }
}
