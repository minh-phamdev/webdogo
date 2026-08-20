<?php

namespace App\Swagger\Schemas;

/**
 * @OA\Schema(
 *     schema="ApiError",
 *     type="object",
 *     @OA\Property(property="success", type="boolean", example=false),
 *     @OA\Property(property="message", type="string"),
 *     @OA\Property(property="errors", type="object")
 * )
 */
class ApiError {}
