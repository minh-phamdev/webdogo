<?php

namespace App\Modules\Product\Application\UseCases;

use App\Modules\Product\Domain\Repositories\ProductMediaRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ListProductMediaUseCase
{
    public function __construct(
        private ProductMediaRepositoryInterface $repository
    ) {}

    public function execute(
        int $productId
    ): Collection {
        return $this->repository->getByProductId(
            $productId
        );
    }
}
