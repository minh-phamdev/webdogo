<?php

namespace App\Modules\Category\Application\UseCases;

use App\Modules\Category\Application\DTOs\CreateCategoryDTO;
use App\Modules\Category\Domain\Repositories\CategoryRepositoryInterface;
use App\Modules\Category\Infrastructure\Persistence\Models\CategoryModel;

class CreateCategoryUseCase
{
    public function __construct(
        private CategoryRepositoryInterface $repository
    ) {}

    public function execute(
        CreateCategoryDTO $dto
    ): CategoryModel {
        return $this->repository->create(
            $dto->data
        );
    }
}
