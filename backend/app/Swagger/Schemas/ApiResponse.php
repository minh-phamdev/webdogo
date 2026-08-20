<?php

namespace App\Swagger\Schemas;

/**
 * @OA\Schema(
 *     schema="ApiResponse",
 *     type="object",
 *     @OA\Property(property="success", type="boolean", example=true),
 *     @OA\Property(property="message", type="string", example="OK"),
 *     @OA\Property(property="data", type="object")
 * )
 */
class ApiResponse {}
