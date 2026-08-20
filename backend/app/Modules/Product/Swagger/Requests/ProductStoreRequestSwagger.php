<?php

namespace App\Modules\Product\Swagger\Requests;

/**
 * @OA\Schema(
 *     schema="ProductStoreRequest",
 *     required={"name","price","category_id"}
 * )
 */
class ProductStoreRequestSwagger
{
    /** @OA\Property(type="string") */
    public string $name;

    /** @OA\Property(type="number") */
    public float $price;

    /** @OA\Property(type="integer") */
    public int $category_id;
}
