<?php

namespace App\Modules\Product\Application\UseCases;

use App\Modules\Product\Domain\Repositories\ProductMediaRepositoryInterface;
use App\Modules\Product\Infrastructure\Persistence\Models\ProductMediaModel;

class GetProductMediaUseCase
{
    public function __construct(
        private ProductMediaRepositoryInterface $repository
    ) {}

    public function execute(
        int $id
    ): ?ProductMediaModel {
        return $this->repository->find(
            $id
        );
    }
}
