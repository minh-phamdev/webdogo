<?php

namespace App\Modules\Product\Application\UseCases\Product;

use App\Modules\Product\Application\Queries\ProductQueryService;
use App\Modules\Product\Application\DTOs\ProductFilterDTO;

class ListProductsUseCase
{
    public function __construct(
        private ProductQueryService $query
    ) {}

    public function execute(ProductFilterDTO $dto)
    {
        return $this->query->paginate($dto);
    }
}
