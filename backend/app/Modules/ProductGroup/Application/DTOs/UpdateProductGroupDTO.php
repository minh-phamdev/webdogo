<?php

namespace App\Modules\ProductGroup\Application\DTOs;

use App\Modules\ProductGroup\Infrastructure\Persistence\Models\ProductGroupModel;

class UpdateProductGroupDTO
{
    public function __construct(
        public ProductGroupModel $productGroup,
        public array $data
    ) {
    }
}
