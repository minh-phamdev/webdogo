<?php

namespace App\Modules\Product\Application\UseCases\Product;

use App\Modules\Product\Application\DTOs\UpdateProductDTO;
use App\Modules\Product\Domain\Repositories\ProductRepositoryInterface;
use App\Modules\Product\Domain\ValueObjects\{
    Slug, Money, Dimension, Weight, Inventory, ProductStatus
};

class UpdateProductUseCase
{
    public function __construct(
        private ProductRepositoryInterface $repository
    ) {}

    public function execute(UpdateProductDTO $dto)
    {
        $product = $this->repository->findById($dto->id);

        if (!$product) {
            throw new \RuntimeException('Product not found');
        }

        // update name + slug
        if ($dto->name !== null) {
            $product->name = $dto->name;
            $product->slug = new Slug($dto->slug ?? $dto->name);
        }

        // update price
        if ($dto->price !== null) {
            $product->price = new Money($dto->price);
        }

        if ($dto->compareAtPrice !== null) {
            $product->compareAtPrice = new Money($dto->compareAtPrice);
        }

        // update dimension
        if ($dto->height !== null) {
            $product->dimension = new Dimension(
                $dto->height,
                $dto->width ?? null,
                $dto->depth ?? null
            );
        }

        // update inventory (enforce invariant)
        if ($dto->quantity !== null || $dto->reservedQuantity !== null) {
            $product->inventory = new Inventory(
                $dto->quantity ?? $product->inventory->available(),
                $dto->reservedQuantity ?? 0
            );
        }

        // update status
        if ($dto->statusId !== null) {
            $product->status = new ProductStatus($dto->statusId);
        }

        // update weight
        if ($dto->weight !== null) {
            $product->weight = new Weight($dto->weight);
        }

        $this->repository->save($product);

        return $product;
    }
}
