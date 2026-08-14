<?php

namespace App\Modules\Product\Application\UseCases;

use App\Modules\Product\Domain\Repositories\ProductRepositoryInterface;
use App\Modules\Product\Infrastructure\Persistence\Models\ProductModel;

class GetProductUseCase
{
    public function __construct(
        private ProductRepositoryInterface $repository
    ) {}

    public function execute(
        int $id
    ): ?ProductModel {

        return $this->repository
            ->find($id);
    }
}
