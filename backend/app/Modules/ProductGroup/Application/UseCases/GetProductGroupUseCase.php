<?php

namespace App\Modules\ProductGroup\Application\UseCases;

use App\Modules\ProductGroup\Domain\Repositories\ProductGroupRepositoryInterface;
use App\Modules\ProductGroup\Infrastructure\Persistence\Models\ProductGroupModel;

class GetProductGroupUseCase
{
    public function __construct(
        private ProductGroupRepositoryInterface $repository
    ) {
    }

    public function execute(int $id): ?ProductGroupModel
    {
        return $this->repository->find($id);
    }
}
