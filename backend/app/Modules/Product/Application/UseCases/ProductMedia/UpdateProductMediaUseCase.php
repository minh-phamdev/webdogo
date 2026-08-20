<?php

namespace App\Modules\Product\Application\UseCases;

use App\Modules\Product\Application\DTOs\UpdateProductMediaDTO;
use App\Modules\Product\Domain\Repositories\ProductMediaRepositoryInterface;
use App\Modules\Product\Infrastructure\Persistence\Models\ProductMediaModel;

class UpdateProductMediaUseCase
{
    public function __construct(
        private ProductMediaRepositoryInterface $repository
    ) {}

    public function execute(
        UpdateProductMediaDTO $dto
    ): ProductMediaModel {
        return $this->repository->update(
            $dto->media,
            $dto->data
        );
    }
}
