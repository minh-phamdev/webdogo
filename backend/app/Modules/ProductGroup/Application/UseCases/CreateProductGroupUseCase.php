<?php

namespace App\Modules\ProductGroup\Application\UseCases;

use App\Modules\ProductGroup\Application\DTOs\CreateProductGroupDTO;
use App\Modules\ProductGroup\Domain\Repositories\ProductGroupRepositoryInterface;
use App\Modules\ProductGroup\Infrastructure\Persistence\Models\ProductGroupModel;

class CreateProductGroupUseCase
{
    public function __construct(
        private ProductGroupRepositoryInterface $repository
    ) {
    }

    public function execute(
        CreateProductGroupDTO $dto
    ): ProductGroupModel {
        return $this->repository->create(
            $dto->data
        );
    }
}
