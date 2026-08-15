<?php

namespace App\Modules\Category\Application\UseCases;

use App\Modules\Category\Application\DTOs\UpdateCategoryDTO;
use App\Modules\Category\Domain\Repositories\CategoryRepositoryInterface;
use App\Modules\Category\Infrastructure\Persistence\Models\CategoryModel;

class UpdateCategoryUseCase
{
    public function __construct(
        private CategoryRepositoryInterface $repository
    ) {}

    public function execute(
        UpdateCategoryDTO $dto
    ): CategoryModel {
        return $this->repository->update(
            $dto->category,
            $dto->data
        );
    }
}
