<?php

namespace App\Modules\Product\Application\DTOs;

use App\Modules\Product\Infrastructure\Persistence\Models\ProductModel;

class UpdateProductDTO
{
    public function __construct(
        public readonly ProductModel $product,
        public readonly array $data
    ) {}
}
