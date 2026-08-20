<?php

namespace App\Modules\Product\Swagger\Schemas;

/**
 * @OA\Schema(
 *     schema="Product",
 *     type="object",
 *     required={"id", "name", "price"}
 * )
 */
class ProductSchema
{
    /**
     * @OA\Property(type="integer", example=1)
     */
    public int $id;

    /**
     * @OA\Property(type="string", example="SKU001")
     */
    public string $sku;

    /**
     * @OA\Property(type="string", example="Tượng Phật Di Lặc")
     */
    public string $name;

    /**
     * @OA\Property(type="number", example=1200000)
     */
    public float $price;

    /**
     * @OA\Property(type="integer", example=10)
     */
    public int $quantity;
}
