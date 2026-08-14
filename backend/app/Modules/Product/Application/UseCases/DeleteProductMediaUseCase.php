<?php

namespace App\Modules\Product\Application\UseCases;

use App\Modules\Product\Domain\Repositories\ProductMediaRepositoryInterface;
use App\Modules\Product\Infrastructure\Persistence\Models\ProductMediaModel;

class DeleteProductMediaUseCase
{
    public function __construct(
        private ProductMediaRepositoryInterface $repository
    ) {}

    public function execute(
        ProductMediaModel $media
    ): bool {
        return $this->repository->delete(
            $media
        );
    }
}
