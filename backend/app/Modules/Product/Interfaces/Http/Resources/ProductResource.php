<?php

namespace App\Modules\Product\Interfaces\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'sku' => $this->sku,

            'group_id' => $this->group_id,
            'category_id' => $this->category_id,
            'theme_id' => $this->theme_id,
            'wood_type_id' => $this->wood_type_id,
            'finish_id' => $this->finish_id,
            'artisan_id' => $this->artisan_id,
            'status_id' => $this->status_id,

            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,

            'price' => $this->price,
            'compare_at_price' => $this->compare_at_price,

            'height_cm' => $this->height_cm,
            'width_cm' => $this->width_cm,
            'depth_cm' => $this->depth_cm,
            'weight_kg' => $this->weight_kg,

            'is_unique' => $this->is_unique,
            'is_handmade' => $this->is_handmade,

            'crafted_year' => $this->crafted_year,

            'quantity' => $this->quantity,
            'reserved_quantity' => $this->reserved_quantity,
            'lead_time_days' => $this->lead_time_days,

            'category' => $this->whenLoaded(
                'category'
            ),

            'group' => $this->whenLoaded(
                'group'
            ),

            'theme' => $this->whenLoaded(
                'theme'
            ),

            'wood_type' => $this->whenLoaded(
                'woodType'
            ),

            'finish_type' => $this->whenLoaded(
                'finishType'
            ),

            'artisan' => $this->whenLoaded(
                'artisan'
            ),

            'status' => $this->whenLoaded(
                'status'
            ),

            'media' => $this->whenLoaded(
                'media'
            ),

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
