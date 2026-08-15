<?php

namespace App\Modules\Category\Application\UseCases;

use App\Modules\Category\Domain\Repositories\CategoryRepositoryInterface;
use App\Modules\Category\Infrastructure\Persistence\Models\CategoryModel;

class DeleteCategoryUseCase
{
    public function __construct(
        private CategoryRepositoryInterface $repository
    ) {}

    public function execute(
        CategoryModel $category
    ): bool {
        return $this->repository->delete(
            $category
        );
    }
}
