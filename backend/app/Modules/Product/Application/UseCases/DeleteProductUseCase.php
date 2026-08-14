<?php

namespace App\Modules\Product\Application\UseCases;

use App\Modules\Product\Domain\Repositories\ProductRepositoryInterface;
use App\Modules\Product\Infrastructure\Persistence\Models\ProductModel;

class DeleteProductUseCase
{
    public function __construct(
        private ProductRepositoryInterface $repository
    ) {}

    public function execute(
        ProductModel $product
    ): bool {

        return $this->repository
            ->delete($product);
    }
}
