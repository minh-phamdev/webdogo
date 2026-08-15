<?php

namespace App\Modules\ProductGroup\Application\UseCases;

use App\Modules\ProductGroup\Application\DTOs\UpdateProductGroupDTO;
use App\Modules\ProductGroup\Domain\Repositories\ProductGroupRepositoryInterface;
use App\Modules\ProductGroup\Infrastructure\Persistence\Models\ProductGroupModel;

class UpdateProductGroupUseCase
{
    public function __construct(
        private ProductGroupRepositoryInterface $repository
    ) {
    }

    public function execute(
        UpdateProductGroupDTO $dto
    ): ProductGroupModel {
        return $this->repository->update(
            $dto->productGroup,
            $dto->data
        );
    }
}
