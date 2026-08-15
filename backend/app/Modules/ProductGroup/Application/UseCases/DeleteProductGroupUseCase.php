<?php

namespace App\Modules\ProductGroup\Application\UseCases;

use App\Modules\ProductGroup\Domain\Repositories\ProductGroupRepositoryInterface;
use App\Modules\ProductGroup\Infrastructure\Persistence\Models\ProductGroupModel;

class DeleteProductGroupUseCase
{
    public function __construct(
        private ProductGroupRepositoryInterface $repository
    ) {
    }

    public function execute(
        ProductGroupModel $productGroup
    ): bool {
        return $this->repository->delete(
            $productGroup
        );
    }
}
