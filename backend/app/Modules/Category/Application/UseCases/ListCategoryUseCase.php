<?php

namespace App\Modules\Category\Application\UseCases;

use App\Modules\Category\Domain\Repositories\CategoryRepositoryInterface;

class ListCategoryUseCase
{
    public function __construct(
        private readonly CategoryRepositoryInterface $repository
    ) {
    }

    public function execute(array $filters = [])
    {
        return $this->repository->getAll($filters);
    }
}
