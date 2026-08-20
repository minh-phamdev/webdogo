<?php

namespace App\Modules\Product\Swagger\Requests;

/**
 * @OA\Schema(schema="ProductUpdateRequest")
 */
class ProductUpdateRequestSwagger
{
    /** @OA\Property(type="string") */
    public ?string $name;

    /** @OA\Property(type="number") */
    public ?float $price;
}
