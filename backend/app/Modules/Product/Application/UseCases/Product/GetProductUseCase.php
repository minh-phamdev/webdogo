<?php

namespace App\Modules\Product\Application\UseCases\Product;

use App\Modules\Product\Domain\Repositories\ProductRepositoryInterface;
use App\Modules\Product\Domain\Entities\Product;

class GetProductUseCase
{
    public function __construct(
        private ProductRepositoryInterface $repository
    ) {}

    public function execute(int $id): ?Product
    {
        return $this->repository->findById($id);
    }
}
