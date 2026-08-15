<?php

namespace App\Modules\ProductGroup\Application\UseCases;

use App\Modules\ProductGroup\Domain\Repositories\ProductGroupRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ListProductGroupUseCase
{
    public function __construct(
        private ProductGroupRepositoryInterface $repository
    ) {
    }

    public function execute(): Collection
    {
        return $this->repository->getAll();
    }
}
