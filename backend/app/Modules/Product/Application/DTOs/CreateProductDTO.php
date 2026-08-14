<?php

namespace App\Modules\Product\Application\DTOs;

class CreateProductDTO
{
    public function __construct(
        public readonly array $data
    ) {}
}
