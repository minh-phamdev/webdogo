<?php

namespace App\Modules\Product\Application\UseCases\Product;

use App\Modules\Product\Domain\Repositories\ProductRepositoryInterface;

class DeleteProductUseCase
{
    public function __construct(
        private ProductRepositoryInterface $repository
    ) {}

    public function execute(int $id): void
    {
        $product = $this->repository->findById($id);

        if (!$product) {
            throw new \RuntimeException('Product not found');
        }

        $this->repository->delete($product);
    }
}
