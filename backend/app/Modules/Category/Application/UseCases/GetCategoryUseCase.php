<?php

namespace App\Modules\Category\Application\UseCases;

use App\Modules\Category\Domain\Repositories\CategoryRepositoryInterface;
use App\Modules\Category\Infrastructure\Persistence\Models\CategoryModel;

class GetCategoryUseCase
{
    public function __construct(
        private CategoryRepositoryInterface $repository
    ) {}

    public function execute(int $id): ?CategoryModel
    {
        return $this->repository->find($id);
    }
}
