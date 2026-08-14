<?php

namespace App\Modules\Product\Application\UseCases;

use App\Modules\Product\Application\DTOs\UpdateProductDTO;
use App\Modules\Product\Domain\Repositories\ProductRepositoryInterface;
use App\Modules\Product\Infrastructure\Persistence\Models\ProductModel;
use Illuminate\Support\Str;
use InvalidArgumentException;

class UpdateProductUseCase
{
    public function __construct(
        private ProductRepositoryInterface $repository
    ) {}

    public function execute(
        UpdateProductDTO $dto
    ): ProductModel {

        $product = $dto->product;

        $data = $dto->data;

        $quantity = $data['quantity']
            ?? $product->quantity;

        $reserved = $data['reserved_quantity']
            ?? $product->reserved_quantity;

        if ($reserved > $quantity) {

            throw new InvalidArgumentException(
                'reserved_quantity không được lớn hơn quantity.'
            );
        }

        if (
            isset($data['name'])
            && empty($data['slug'])
        ) {

            $data['slug'] = Str::slug(
                $data['name']
            );
        }

        return $this->repository
            ->update(
                $product,
                $data
            );
    }
}
