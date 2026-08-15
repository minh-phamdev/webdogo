<?php

namespace App\Modules\ProductStatus\Domain\Entities;

class ProductStatus
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $code,
        public readonly string $name,
    ) {
    }
}
