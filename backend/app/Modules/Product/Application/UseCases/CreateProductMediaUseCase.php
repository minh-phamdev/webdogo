<?php

namespace App\Modules\Product\Application\UseCases;

use App\Modules\Product\Application\DTOs\CreateProductMediaDTO;
use App\Modules\Product\Domain\Repositories\ProductMediaRepositoryInterface;
use App\Modules\Product\Infrastructure\Persistence\Models\ProductMediaModel;

class CreateProductMediaUseCase
{
    public function __construct(
        private ProductMediaRepositoryInterface $repository
    ) {}

    public function execute(
        CreateProductMediaDTO $dto
    ): ProductMediaModel {
        return $this->repository->create(
            $dto->data
        );
    }
}
