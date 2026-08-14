<?php

namespace App\Modules\Product\Application\DTOs;

use App\Modules\Product\Infrastructure\Persistence\Models\ProductMediaModel;

class UpdateProductMediaDTO
{
    public function __construct(
        public ProductMediaModel $media,
        public array $data,
    ) {}
}
