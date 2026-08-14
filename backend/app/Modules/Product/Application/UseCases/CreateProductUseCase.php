<?php

namespace App\Modules\Product\Application\UseCases;

use App\Modules\Product\Application\DTOs\CreateProductDTO;
use App\Modules\Product\Domain\Repositories\ProductRepositoryInterface;
use App\Modules\Product\Infrastructure\Persistence\Models\ProductModel;
use Illuminate\Support\Str;

class CreateProductUseCase
{
    public function __construct(
        private ProductRepositoryInterface $repository
    ) {}

    public function execute(
        CreateProductDTO $dto
    ): ProductModel {

        $data = $dto->data;

        if (
            empty($data['slug'])
        ) {
            $data['slug'] = Str::slug(
                $data['name']
            );
        }

        return $this->repository
            ->create($data);
    }
}
