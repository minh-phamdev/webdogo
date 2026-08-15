<?php

namespace App\Modules\ProductGroup\Domain\Entities;

class ProductGroup
{
    public function __construct(
        public ?int $id = null,

        public string $name = '',

        public string $slug = '',
    ) {
    }
}
